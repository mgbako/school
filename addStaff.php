<?php
require_once 'core/init.php';

if(Input::exists())
{
    $validate = new Validation();
    $validation = $validate->check($_POST, [
        'firstName' => [
            'required' => true
        ],
        'lastName' => [
            'required' => true
        ],
        'otherName' => [
            'required' => true
        ],
        'username' => [
            'required' => true,
            'unique' => 'staffs'
        ],
        'email' => [
            'required' => true,
            'unique' => 'staffs'
        ],
        'password' => [
            'required' => true,
            'min' => 6
        ],
        'confirmPassword' => [
            'required' => true,
            'matches' => 'password'
        ],
        'dob' => [
            'required' => true
        ],
        'address' => [
            'required' => true
        ],
        'state' => [
            'required' => true
        ],
        'nationality' => [
            'required' => true
        ],
        'types' => [
            'required' => true
        ]
    ],
        'staffs', 'username');

    if($validate->passed())
    {
        $user = new Staff();
        $salt = Hash::salt(32);
        try{
            $user->create(
                array(
                    'firstName' => Input::get('firstName'),
                    'lastName' => Input::get('lastName'),
                    'otherName' => Input::get('otherName'),
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'password' =>Hash::make(Input::get('password'), $salt),
                    'dob' => date(Input::get('dob')),
                    'address' => Input::get('address'),
                    'phone' => Input::get('phone'),
                    'state' => Input::get('state'),
                    'nationality' => Input::get('nationality'),
                    'type' => Input::get('types'),
                    'image' => Image::getImage('image'),
                    'imageName' => Image::name('image'),
                    'salt' => $salt
                )
            );

            Session::flash('home', 'You have been registered and can now login');

            //Redirect::to('index.php');
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    else
    {
        foreach($validate->errors() as $errors)
        {
            echo "<p>".$errors . "</p>";
        }
    }
}

$title = "Add Staff";
$view_path = "views/addStaff.view.php";
include "views/layout.php";
