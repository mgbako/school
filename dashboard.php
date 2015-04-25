<?php

require_once 'core/init.php';


$user = new Student();

if(!$user->isLoggedIn())
{
    Redirect::to('./');
}

$title = "Welcome ". $user->data()['username'];

$view_path = "views/dashboard.view.php";
include 'views/layout.php';