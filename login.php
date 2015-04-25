<?php
require_once 'core/init.php';


$user = new Student();

if($user->isLoggedIn())
{
    Redirect::to('./');
}

if(Input::exists())
{
    if(Token::check(Input::get('token')))
    {
        $validate = new Validation();
        $validations = $validate->check($_POST, [
           'username' => ['required' => true],
            'password' => ['required' => true]
        ]);

        if($validate->passed())
        {

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if($login)
            {
                //Session::flash('home', 'You have been registered and can now login');
                Redirect::to('./');
            }
            else
            {
                echo '<p>Sorry, logging in failed</p>';
            }
        }
        else
        {
            foreach($validate->errors() as $error)
            {
                echo $error, '<br>';
            }
        }

    }
}



$title = "Login";
$view_path = "views/login.view.php";
include "views/layout.php";
