<?php


//server is on 
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $PROTO = 'https';
}
else {
  $PROTO = 'http';
} 

//get server path to project
$app_url = ($PROTO  )
          . "://".$_SERVER['HTTP_HOST']
          //. $_SERVER["SERVER_NAME"]
          . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
          . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");

//project path 
define("APPURL", $app_url);


//create function for connection attribuits  and make instance of the student_class
function app_db ()
{
	//المسار كامل للملف
    //full path of php page
	include_once dirname(__FILE__).'/db_helper.php';

    $db_conn = array(
        'host' => 'localhost', 
        'database' => 'liberary_sys_db', 
        'user' => 'root',
        'pass' => '',        
    );

    $db = new studentClass($db_conn);
    return $db;     
}
function saerch_db ()
{
	//المسار كامل للملف
    //full path of php page
	include_once dirname(__FILE__).'/queries_class.php';

    $db_conn = array(
        'host' => 'localhost', 
        'database' => 'liberary_sys_db', 
        'user' => 'root',
        'pass' => '',        
    );

    $db = new search_class($db_conn);
    return $db;     
}
