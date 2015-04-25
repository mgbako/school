<?php
require_once 'core/init.php';

if(Session::exists('subject'))
{
    echo Session::flash('subject');
}

/*$user = new User();

if(!$user->isLoggedIn())
{
    Redirect::to('/');
}*/

if(Input::exists() && $_POST['mt']=='mt')
{
	$validate = new Validation();
	$validation = $validate->check($_POST, [
			'question' => [
				'required' => true
			],
			'option1' => [
				'required' => true
			],
			'option2' => [
				'required' => true
			],
			'option3' => [
				'required' => true
			],
			'option4' => [
				'required' => true
			]
		], 
			'questions');

	if($validate->passed())
	{
		try{
			$questions = new Database();
			$questions->insert('questions',[
					'question'=>Input::get('question'),
					'subject'=>Input::get('subject')
				]
			);

			$lastId = $questions->lastId();
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
	else
	{
		foreach ($validate->errors() as $errors) 
		{
			echo "<p>"	.$errors. "</p>";
		}
	}
}


if(Input::exists() && $_POST['sub']=='sub')
{
		$validate = new Validation();
    	$validation = $validate->check($_POST, [
	        'subject' => [
	            'required' => true,
	            'unique' => 'subjects'
		    ]
	    ],
	        'subjects', 'subject');

	    if($validate->passed())
	    {
	        
	        try{
	        	$subjects = new Database();
	            $subjects->insert('subjects',
	            	['subject' => Input::get('subject')]
	            );

	            Session::flash('subject', 'Subject Added');

	            Redirect::to('./addQuestion.php');
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


$subjects = new Database();
$subject = $subjects->get('subjects');


//$title = "Welcome ". $user->data()['username'];
$view_path = 'views/addQuestion.view.php';
include 'views/layout.php';