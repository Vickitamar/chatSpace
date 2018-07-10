<?php
//Start Session
session_start();

//Include Configuration
require_once('config/config.php');
require_once('database.php');
require_once('process.php');



//Autoload Classes
function __autoload($class_name){
	require_once('classes/'.$class_name . '.php');
}

//account class instance
$account = new Account($con);
$topic = new Topic($con);
require_once('handlers/login-handler.php');
require_once('handlers/register-handler.php');
require_once('handlers/newTopic-handler.php');
require_once('handlers/reply-handler.php');
require_once('handlers/format-handlers.php');


