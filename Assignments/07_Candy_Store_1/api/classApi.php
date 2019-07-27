<?php

require_once "config.php";
require_once "vendor/autoload.php";
use \Firebase\JWT\JWT;

class API{
    public $routes;
    protected $conn;
    protected $secret_key;

    function __construct($host,$user,$password,$db,$secret) {
        $this->routes = ['POST'=>[],'GET'=>[]];
        $this->secret_key = $secret;
        $this->dbConnect($host,$user,$password,$db);
    }

    protected function dbConnect($host,$user,$password,$db){
        // Enter your Host, username, password, database below.
        // This password should not end up in github (like I just did).
        $this->conn = mysqli_connect($host, $user, $password, $db);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }
    }

    /**
     * Adds a route to the class (or our array of routes).
     */
    public function addRoute($type,$name,$handler,$params=[]){
        $this->routes[$type][] = ['route' => $name, 'params' => $params, 'handler' => $handler];
    }

    public function handleRequest(){

        $requestData = $this->gatherRequestData();

        //$this->send_response($requestData);
        
        // No route picked? Show available routes.
        if (!isset($requestData['route'])) {
            $this->show_routes();
            exit;
        }

        // Doing a GET or a POST
        $method = $requestData['method'];

        // What route am I calling
        $route = $requestData['route'];

        // What params to send to handler
        $params = $requestData['params'];

        // What function is handling this route
        $handler = $this->getHandler($method, $route);

        //$this->send_response([$method,$route,$params,$handler]);

        // Call handler with params from request
        $this->$handler($params);
        
    }

    //https://stackoverflow.com/questions/40582161/how-to-properly-use-bearer-tokens
    /**
     * Get header Authorization
     * */
    protected function getAuthorizationHeader()
    {
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }

    /**
     * get access token from header
     * */
    protected function getBearerToken()
    {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    /**
     * Looks through our routes array and finds the correct "handler" or function to call
     *
     * @param [string] $method : GET or POST
     * @param [string] $route_name : name of route :)
     * @param [array] $params
     * @return array ['handler' => handler_name , 'params' => array of values one for every param needed by handler]
     */
    public function getHandler($method, $route_name)
    {

        $handler_name = '';

        foreach ($this->routes[$method] as $route) {
            if ($route['route'] == $route_name) {
                return $route['handler'];
            }
        }

        return null;
    }

    /**
     * Get all request data from get or posted sources
     *
     * @return array $reqestData
     */
    public function gatherRequestData()
    {

        // Build a container for our request data from client
        $requestData = ['params' => []];
        $non_param = ['method', 'route'];

        // Determine actual method since we are putting GET and POST
        // data into single container
        if (isset($_SERVER['REQUEST_METHOD'])) {
            $requestData['method'] = $_SERVER['REQUEST_METHOD'];
        }

        // Not fully implemented
        // https://www.techiediaries.com/php-jwt-authentication-tutorial/
        $requestData['bearer'] = $this->getBearerToken();

        if($requestData['bearer']){
            try {
                $decoded = JWT::decode($requestData['bearer'], $this->secret_key, array('HS256'));
            }catch (Exception $e) {
                $this->send_response([],false,"Failed to decode JWT token!!");
            }
        }

        // Attempt to read raw input from client
        $_INPUT = json_decode(file_get_contents("php://input"), true);

        // If we got the raw input, good otherwise check POST array
        if (is_array($_INPUT)) {
            foreach ($_INPUT as $key => $value) {
                if (!in_array($key, $non_param)) {
                    $requestData['params'][$key] = $value;
                } else {
                    $requestData[$key] = $value;
                }
            }
        } else {
            foreach ($_POST as $key => $value) {
                if (!in_array($key, $non_param)) {
                    $requestData['params'][$key] = $value;
                } else {
                    $requestData[$key] = $value;
                }
            }
        }

        // Throw in any URL params for good measure
        foreach ($_GET as $key => $value) {
            if (!in_array($key, $non_param)) {
                $requestData['params'][$key] = $value;
            } else {
                $requestData[$key] = $value;
            }
        }

        // Return our data
        return $requestData;
    }

    /**
     * build a javascript web token
     *
     * @param [array] $data
     * @return JWT token
     */
    public function buildJWT($data,$exp=900)
    {

        if (array_key_exists('HTTP_HOST', $_SERVER)) {
            $host = $_SERVER['HTTP_HOST']; // gets domain name (or ip address)
        } else {
            $host = 'localhost/';
        }

        $issuer_claim = $host; // this can be the servername
        $audience_claim = "profgriffin-api"; // target audience
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        $expire_claim = $issuedat_claim + $exp; // plus expiration
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => $data,
        );

        return JWT::encode($token, $this->secret_key);
    }

    /**
     * Builds a response to send back to requestor.
     *
     * @param [type] $response : data from calling entity (function probably)
     * @param boolean $success : true or false
     * @param string $error : Error message if success = false
     * @return prints json result to stdout
     */
    public function send_response($response, $success = true, $error = "")
    {
        $response_data = [];

        if ($success) {
            if (!is_array($response)) {
                $response = [$response];
            }
            $count = sizeof($response)-2;
            $response_data['count'] = $count;
        }
        if ($error) {
            $response_data['error'] = $error;
        }

        if(isset($response['start'])){
            $response_data['start'] = $response['start'];
            unset($response['start']);
        }

        if(isset($response['chunk'])){
            $response_data['chunk'] = $response['chunk'];
            unset($response['chunk']);
        }

        $response_data['success'] = $success;
        $response_data['data'] = $response;

        $response_data['jwt'] = $this->buildJWT(['token' => 'test']);

        echo json_encode($response_data);
        exit;
    }

    /**
     * Dumps the routes out to the browser simply to help programmer see what is available.
     *
     * @param [string] $inroute : a route name passed in if there wasnt a route to match.
     * @return prints response (json)
     */
    public function show_routes($inroute = null)
    {

        if (array_key_exists('REQUEST_SCHEME', $_SERVER)) {
            $scheme = $_SERVER['REQUEST_SCHEME']; // gets http or https
        } else {
            $scheme = '';
        }
        if (array_key_exists('HTTP_HOST', $_SERVER)) {
            $host = $_SERVER['HTTP_HOST']; // gets domain name (or ip address)
        } else {
            $host = 'localhost/';
        }
        $script = $_SERVER['PHP_SELF']; // gets name of 'this' file

        $prefix = "{$scheme}://{$host}{$script}"; //http://terrywgriffin.com/api.php

        $prefix = str_replace('index.php', '', $prefix);

        $response = [];

        $response['route'] = $inroute;
        foreach (['GET', 'POST'] as $rtype) {
            $response[$rtype] = [];
            foreach ($this->routes[$rtype] as $r) {
                $temp = [];
                foreach ($r as $k => $v) {
                    if ($k == 'route') {
                        $v = $prefix . $v;
                    }
                    $temp[$k] = $v;
                }
                $response[$rtype][] = $temp;
            }
        }
        if ($inroute) {
            echo $this->send_response($response, false, "Error: Route:{$inroute} does not exist!");
        } else {
            echo $this->send_response($response);
        }
        exit;
    }

    protected function runQuery($sql){

        $result = $this->conn->query($sql);

        $response = ['success'=>false,'data'=>[],'error'=>null];

        if($result){
            $response['success'] = true;
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()){
                    $response['data'][] = $row;
                }

            }
        }else{
            $response['error'] = $this->conn->error;
        }
        return $response;
    }

}

/**
 * Helper log function that writes contents to "log.log"
 *
 * NOTICE!! => make sure `log.log` is writable by server (chmod 777 log.log) or (chown www-data:www-data log.log)
 *
 * @param [any] $stuff
 * @return void
 */
function logg($stuff)
{
    file_put_contents('log.log', print_R($stuff), true);
}

