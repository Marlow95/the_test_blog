<?php

ob_start();
session_start();

//Database Connection
require_once(__DIR__ . '/Database.php');
//Imports ENV Variables
require_once('../get_env.php');

//Autoload Models
spl_autoload_register(fn($class)=> require_once('Model/'. $class . '.php'));


//Database Created
$db = new Database(
    $dotenv->load()['DB_TYPE'],
    $dotenv->load()['DB_HOST'],
    $dotenv->load()['DB_PORT'],
    $dotenv->load()['DB_NAME'],
    $dotenv->load()['DB_USER'],
    $dotenv->load()['DB_PASS']
);

$db->connectDatabase();



/* Example of How to Access Data

$blog_users = new Users($db);
$get_all_users = $blog_users->getAll();

foreach($get_all_users as $users){
    print_r($users);
};

*/

