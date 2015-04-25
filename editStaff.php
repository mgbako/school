<?php
require_once 'core/init.php';

if(Input::get('id') && isNumeric('id'))
{

	$id = Input::get('id');
	$db = new Database();
	$db->where('id', $id);
	$staffs = $db->get('staffs');

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
	        'address' => [
	            'required' => true
	        ],
	        'state' => [
	            'required' => true
	        ],
	        'nationality' => [
	            'required' => true
	        ],
	        'class' => [
	            'required' => true
	        ]
	    ],
	        'staffs');

	    if($validate->passed())
	    {
	        $user = new Student();

	        try{
	            $db->update('staffs', array(
	                'firstName' => Input::get('firstName'),
	                'lastName' => Input::get('lastName'),
	                'otherName' => Input::get('otherName'),
	                'address' => Input::get('address'),
	                'phone' => Input::get('phone'),
	                'state' => Input::get('state'),
	                'nationality' => Input::get('nationality'),
	                'type' => Input::get('class'),
	                'image' => Image::getImage('image'),
	                'imageName' => Image::name('image')
	            ));

	            if($db->affectedRow() == 1)
	            {
	            	Session::flash('staff', 'Your Profile has been Updated');
	            	Redirect::to('./');
	            }
	            

	            
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
	
}


//$title = "Welcome ". $user->data()['username'];
$view_path = 'views/editStaff.view.php';
include 'views/layout.php';