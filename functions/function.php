<?php 

function pretag($data)
{
	echo "<pre>";
		print_r($data);
	echo "</pre>";
}

function view($path)
{
	return (isset($path)) ? include "./views/".$path."view.php" : false ;
}

function show($data)
{
	return (isset($data)) ? $data : "";
}

function isNumeric($data)
{
	if(isset($_GET[$data]))
	{
		return is_numeric($_GET[$data]);	
	}
	elseif(isset($_POST[$data]))
	{
		return is_numeric($_POST[$data]);
	}
	
}