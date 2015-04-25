<?php
require_once 'core/init.php';

if(Input::get('id') && isNumeric('id'))
{

	$id = Input::get('id');
	$db = new Database();
	$db->where('id', $id);
	$students = $db->get('students');
}
if(Input::exists())
{
	if(Input::get('sure') == 'Yes')
	{
		$db->delete('students');
		if($db->affectedRow() == 1)
		{
			Session::flash('student', 'Your Profile has been deleted');
			Redirect::to('./students.php');
		}
	}

	Redirect::to('./students.php');
}

$view_path = 'views/deleteStudent.view.php';
include 'views/layout.php';