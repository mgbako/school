<?php
require_once 'core/init.php';

if(Input::get('id') && isNumeric('id'))
{

	$id = Input::get('id');
	$db = new Database();
	$db->where('id', $id);
	$staffs = $db->get('staffs');
}
if(Input::exists())
{
	if(Input::get('sure') == 'Yes')
	{
		$db->delete('staffs');
		if($db->affectedRow() == 1)
		{
			Session::flash('staff', 'Your Profile has been deleted');
			Redirect::to('./staffs.php');
		}
	}

	Redirect::to('./staffs.php');
}

$view_path = 'views/deleteStaff.view.php';
include 'views/layout.php';