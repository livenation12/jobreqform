<?php
session_start();
require_once('formclass.php');
$class->getUser();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div style="text-align: center; padding-top: 15rem;">
		<h1>Enter Your Name</h1>
	<form action="" method="GET">
		<input type="text" name="fname" placeholder="Firstname">
		<br>
		<input type="text" name="midname" placeholder="Middlename">
		<br>
		<input type="text" name="lname" placeholder="Lastname">
		<br>
		<input type="text" name="suffix" placeholder="Suffix/Optional">
		<br>
		<input type="submit" name="submit" value="Enter">
	</form>
</div>
</body>
</html>