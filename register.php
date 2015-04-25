<?php
    require_once 'core/init.php';

    if(Input::exists())
    {

            $validate = new Validation();
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 20,
                    'unique' => 'users'
                ),
                'password' => array(
                    'required' => true,
                    'min' => 6
                ),

                'confirm_password' =>array(
                    'required' => true,
                    'matches' => 'password'
                ),
                'name'=> array(
                    'required' => true,
                    'min' => 2,
                    'max' => 50
                )
            ));

            if($validate->passed())
            {
                $user = new User();
                $salt = Hash::salt(32);
                try{
                    $user->create(array(
                        'username' => Input::get('username'),
                        'password' =>Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'name' => Input::get('name'),
                        'joined' => date('Y-m-d H:i:s'),
                        'groups' => 1
                    ));

                    Session::flash('home', 'You have been registered and can now login');
                   Redirect::to('index.php');
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

    $title = "Registration Form";

    $view_path = "views/register.view.php";
    include 'views/layout.php';
?>


