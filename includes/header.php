<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	session_start();
	try {
	$connexion = new PDO('mysql:host=localhost;dbname=library','root','');
		}
	
	catch(Exception $e)
	{
		echo 'Erreur de connexion a la Base de données :' . $e->getMessage();
		die(); 
	}

$tronquoy = "noob";

 ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>OLibrary</title>
	<link rel="icon" href="./images/favicon.ico" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div class="logo">
        	<!-- <span class="icon icon-cog"></span> -->
			
			
			
			<div class="clear"></div>
			<img id="logo" src="images/logo.png">