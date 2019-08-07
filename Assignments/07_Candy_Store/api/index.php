<?php

// required headers
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "classApi.php";
require_once "classCandyApi.php";
require_once "config.php";
require_once "vendor/autoload.php";
use \Firebase\JWT\JWT;

$app = new CandyApi($auth['host'], $auth['user'], $auth['password'], $auth['db'],$secret_key );

$app->addRoute('POST','register','doRegister',['data' => 'json']);
$app->addRoute('GET','auth','getAuth',['email' => 'string','password'=>'string']);
$app->addRoute('GET','categories','getCategories',[]);
$app->addRoute('GET','candy','getCandy',['column'=>'string','keyword'=>'string','matchtype'=>'string','min'=>'float','max'=>'float','start'=>'int','chunk'=>'int']);

$app->handleRequest();




