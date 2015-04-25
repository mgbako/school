<?php
require_once 'core/init.php';

if(Session::exists('student'))
{
    echo Session::flash('student');
}


/*$user = new User();

if(!$user->isLoggedIn())
{
    Redirect::to('/');
}*/

$db = new Database();

$students = $db->get('students');

//$title = "Welcome ". $user->data()['username'];
$view_path = 'views/students.view.php';
include 'views/layout.php';