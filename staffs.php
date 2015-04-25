<?php
require_once 'core/init.php';

if(Session::exists('staff'))
{
    echo Session::flash('staff');
}


/*$user = new User();

if(!$user->isLoggedIn())
{
    Redirect::to('/');
}*/

$db = new Database();

$staffs = $db->get('staffs');

//$title = "Welcome ". $user->data()['username'];
$view_path = 'views/staffs.view.php';
include 'views/layout.php';