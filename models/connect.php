<?php 
	session_start();
	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=m2l;charset=utf8","root","");
	}
	catch (Exception $e)
	{
		die("erreur de connection");
	}
	

?>