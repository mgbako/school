<?php
/**
 * Created by PhpStorm.
 * User: Mgbako
 * Date: 3/27/2015
 * Time: 1:55 PM
 */
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'name' => 'school',
        'host' => 'localhost',
        'user' => 'root',
        'password' =>''
    ),

    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),

    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function($class){
    require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';
require_once 'functions/function.php';

$db = new Database();