<?php
/**
 * Created by PhpStorm.
 * User: Mgbako
 * Date: 3/27/2015
 * Time: 1:33 PM
 */

include_once 'core/init.php';

if(Session::exists('home'))
{
    echo Session::flash('home');
}

$user = new Student();
if($user->isLoggedIn())
{
    include_once('dashboard.php');
}
else
{
    include_once('login.php');
}
