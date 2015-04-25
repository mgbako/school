<?php
require_once 'core/init.php';

$user = new Student();

if($user->isLoggedIn())
{
    $user->logout();
    Redirect::to('./');
}
else{
    Redirect::to('./');
}

