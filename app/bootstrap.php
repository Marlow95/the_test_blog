<?php

ob_start();
session_start();

//Database Connection
require_once(__DIR__ . '/Database.php');
//Imports Development ENV Variables
require_once('../get_env.php');
//Tmports PHPMail 
require_once('../mail.php');

//Autoload Models
spl_autoload_register(fn($class)=> require_once('Model/'. $class . '.php'));


//Database Created

//Development database
/*
$db = new Database(
    $dotenv->load()['DB_TYPE'],
    $dotenv->load()['DB_HOST'],
    $dotenv->load()['DB_PORT'],
    $dotenv->load()['DB_NAME'],
    $dotenv->load()['DB_USER'],
    $dotenv->load()['DB_PASS']
); */

//Production database
$db = new Database(
    $_ENV['DB_TYPE'],
    $_ENV['DB_HOST'],
    $_ENV['DB_PORT'],
    $_ENV['DB_NAME'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);

$db->connectDatabase();



/* Example of How to Access Data

$blog_users = new Users($db);
$get_all_users = $blog_users->getAll();

foreach($get_all_users as $users){
    print_r($users);
};

*/

