<?php
error_reporting(1);
//https://www.sitepoint.com/php-53-namespaces-basics/
//http://zetcode.com/db/mongodbphp/
//http://coreymaynard.com/blog/creating-a-restful-api-with-php/
//https://programmerblog.net/php-mongodb-tutorial/

require('mongo_helper.php');

abstract class API
{
    /**
     * Property: method
     * The HTTP method this request was made in, either GET, POST, PUT or DELETE
     */
    protected $method = '';
    /**
     * Property: endpoint
     * The Model requested in the URI. eg: /files
     */
    protected $endpoint = '';
    /**
     * Property: verb
     * An optional additional descriptor about the endpoint, used for things that can
     * not be handled by the basic methods. eg: /files/process
     */
    protected $verb = '';
    /**
     * Property: args
     * Any additional URI components after the endpoint and verb have been removed, in our
     * case, an integer ID for the resource. eg: /<endpoint>/<verb>/<arg0>/<arg1>
     * or /<endpoint>/<arg0>
     */
    protected $args = array();
    /**
     * Property: file
     * Stores the input of the PUT request
     */
    protected $file = null;

    /**
     * Constructor: __construct
     * Allow for CORS, assemble and pre-process the data
     */
    public function __construct()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
        
        $this->logger = new thelog();
        $this->logger->clear_log();

        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->request_uri = $_SERVER['REQUEST_URI'];
        
        $this->logger->do_log($this->method);
        
        $this->args = explode('/', rtrim($this->request_uri, '/'));
        
        $this->logger->do_log($this->args);
        
        while ($this->args[0] == '' || $this->args[0] == 'api.php') {
            array_shift($this->args);
        }
        
        $this->endpoint = array_shift($this->args);


        if (strpos($this->endpoint, '?')) {
            list($this->endpoint,$urlargs) = explode('?', $this->endpoint);
        }
        
        $this->logger->do_log($this->args, "args array:");
        $this->logger->do_log($this->endpoint, "endpoint:");
        

        switch ($this->method) {
            case 'POST':
                $this->request = $this->_cleanInputs($_POST);
                break;
            case 'DELETE':
            case 'GET':
                $this->request = $this->_cleanInputs($_GET);
                break;
            case 'PUT':
                $this->request = $this->_cleanInputs($_GET);
                $this->file = file_get_contents("php://input");
                break;
            default:
                $this->_response('Invalid Method', 405);
                break;
        }
        
        if ($urlargs) {
            $urlargs = explode('&', $urlargs);
            for ($i=0; $i<sizeof($urlargs); $i++) {
                list($k,$v) = explode('=', $urlargs[$i]);
                $this->request[$k] = $v;
            }
        }
    }
    
    public function processAPI()
    {
        $this->logger->do_log($this->endpoint);
        if (method_exists($this, $this->endpoint)) {
            return $this->_response($this->{$this->endpoint}($this->args));
        }
        return $this->_response("No Endpoint: $this->endpoint", 404);
    }

    private function _response($data, $status = 200)
    {
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        return json_encode($data);
    }

    private function _cleanInputs($data)
    {
        $clean_input = array();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->_cleanInputs($v);
            }
        } else {
            $clean_input = trim(strip_tags($data));
        }
        return $clean_input;
    }

    private function _requestStatus($code)
    {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code])?$status[$code]:$status[500];
    }
}

class MyAPI extends API
{
    public function __construct()
    {
        parent::__construct();
        
        $this->mdb = 'fake-business';
        $this->mh = new mongoHelper($this->mdb);
        $this->primary_key = 'uid';
        $this->mh->setDbcoll('users');
        $this->temparray = [];
    }


    /**
     * Example of an Endpoint
     */
    protected function random_user()
    {
        $this->mh->setDbcoll('users');
        $this->mh->delete();
        $results = [];
        if ($this->method == "GET") {
            if ($this->request['size']) {
                $size=$this->request['size'];
            } else {
                $size=100;
            }

            $data = file_get_contents("https://randomuser.me/api/?results={$size}&nat=us&exc=id");

            if ($data) {
                $data = json_decode($data, true);

                foreach ($data['results'] as $user) {
                    $this->temparray = [];
                    $max_id = $this->mh->get_max_id($this->mdb, $this->mh->collection, '_id');
                    $this->logger->do_log($max_id, "Max ID:");
                    $user['_id'] = $max_id;
                    $this->flatten_array($user);
                    $this->logger->do_log($user, "flatten");
                    $results[] = $this->mh->insert([$this->temparray]);
                }
            }
        }
        return $results;
    }


    private function flatten_array($array){
        foreach($array as $key => $value){
            //If $value is an array.
            if(is_array($value)){
                //We need to loop through it.
                $this->flatten_array($value);
            } else{
                //It is not an array, so print it out.
                $this->temparray[$key] = $value;
            }
        }
    }


    
    /**
     *add_user: adds a new user(s) to the collection
     */
    protected function add_user()
    {
    }

    /**
     *update_user: updates a user(s) in the collection
     */
    protected function update_user()
    {
    }

    /**
     *delete_user: removes a user(s) from the collection
     */
    protected function delete_user()
    {
    }


    /**
     *find_user: finds a user(s) from the collection
     */
    protected function find_user()
    {
        
        $newstuff = [];
        foreach($this->request as $key => $val){
            $newstuff[$key] = $this->clean_entry($val);
        }
        return $this->mh->query($newstuff);
        //return ["request"=>$newstuff,"method"=>$this->method];
    }

    private function clean_entry($entry){
        return stripslashes(strip_tags(urldecode($entry)));
    }


    /**
     *All things user.
     */
    protected function user()
    {
        $this->mh->setDbcoll('users');
        if ($this->method == 'GET') {
            $users = $this->mh->query($this->request);
            return $users;
        } elseif ($this->method == "POST") {
            //not good implementation right now
            if (array_key_exists('data', $this->request)) {
                if (is_array($this->request['data'])) {
                    $this->request = $this->request['data'];
                    //had issues with "posting" so I'm debugging here
                    if (!$this->has_string_keys($this->request)) {
                        $this->logger->do_log(sizeof($this->request), "regular array");
                        $this->request = $this->addPrimaryKey($this->request, $this->primary_key);
                        $result = $this->mh->insert($this->request);
                    } else {
                        $this->logger->do_log(sizeof($this->request), "assoc array");
                        $result = $this->mh->insert([$this->request]);
                    }
                }
            } else {
                $result = $this->mh->insert([$this->request]);
            }
            
            return $result;
        } elseif ($this->method == "DELETE") {
            if (count($this->request) > 0) {
                $result = $this->mh->delete([$this->request]);
            } else {
                $result = $this->mh->delete();
            }
            return $result;
        }
    }


    private function addPrimaryKey($data, $coll, $key)
    {
        $max_id = $this->mh->get_max_id($this->mdb, $coll, $key);
        if ($this->has_string_keys($data)) {
            if (!array_key_exists($data, $key)) {
                $data[$key] = $max_id;
            }
        } else {
            foreach ($data as $row) {
                if (!array_key_exists($data, $key)) {
                    $data[$key] = $max_id;
                    $max_id++;
                }
            }
        }
        return $data;
    }
     
     
    private function isAssoc(array $arr)
    {
        if (array() === $arr) {
            return false;
        }
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
    
    private function has_string_keys(array $array)
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}

$api = new MyAPI();
echo $api->processAPI();

exit;
