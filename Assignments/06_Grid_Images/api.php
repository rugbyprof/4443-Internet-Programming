<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
//header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// Associative array of routes with general info about each route.
// Really used to help document our API
$routes = [
    ['route'=>"student",'type'=>'GET','params'=>[]]
];

// Initialize route to nothing.
$route = false;

// See if a route choice is in either the POST or GET array.
if(array_key_exists('route', $_POST)){
    $route = $_POST['route'];
    unset($_POST['route']);
}else if(array_key_exists('route', $_GET)){
    $route = $_GET['route'];
}else{
    $route = false;
}

// No route picked? Show available routes.
if (!$route) {
    show_routes();
    exit;
}

// Choose which route to run
switch($route){
    case 'student' : getStudent($_POST);
        break;
    default: show_routes($route);
}

/**
 * Open the student json file and send it back.
 * Params:
 *    $data [string] : possible student id if we only want one student.
 * 
 * Returns:
 *    json of students
 */
function getStudent($data){
    // open json file and send it back!

    if(file_exists('student_data.json')){
        $data = file_get_contents('student_data.json');
    }else{
        echo build_response([],false,"Could not open student_data.json!!");
    }

    $json = json_decode($data,true);

    if(sizeof($json) > 0){
        echo build_response($json,true);
    }else{
        echo build_response([],false,"There was a problem converting the data => json!!");
    }
    
}

/**
 * Dumps the routes out to the browser simply to help programmer see what is available.
 * Params:
 *     $route [string] : a route name passed in if there wasnt a route to match.
 * Returns:
 *     prints response (json)
 */
function show_routes($inroute=null)
{
    global $routes;

    $scheme = $_SERVER['REQUEST_SCHEME'];   // gets http or https
    $host = $_SERVER['HTTP_HOST'];          // gets domain name (or ip address)
    $script = $_SERVER['PHP_SELF'];         // gets name of 'this' file

    $prefix = "{$scheme}://{$host}{$script}"; //http://terrywgriffin.com/api.php

    $prefix = str_replace('index.php','',$prefix);

    $response = [];

    $response['route'] = $inroute;
    $i = 0;
    foreach ($routes as $r) {
        $temp = [];
        foreach ($r as $k => $v) {
            if ($k == 'route') {
                $v = $prefix.$v;
            }
            $temp[$k] = $v;
        }
        $response[] = $temp;
    }
    if($inroute){
        echo build_response($response,false,"Error: Route:{$inroute} does not exist!");
    }else{
        echo build_response($response);
    }
    exit;
}

/**
 * Builds a response to send back to web page.
 * 
 * Params:
 *     $response [array] : data from caller
 *     $success  [bool] : true or false
 *     $error    [string] : Error message if success = false
 * Returns:
 *     null
 *     prints json result to stdout
 */
function build_response($response,$success=true,$error="")
{
    $response_data = [];

    if ($success) {
        $count = sizeof($response);
        $response_data['count'] = $count;
    }
    if ($error){
        $response_data['error'] = $error;
    }
    
    $response_data['success'] = $success;
    $response_data['data'] = $response;
    echo json_encode($response_data);
    exit;
}
