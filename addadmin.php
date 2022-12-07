
<?php
require_once('formclass.php');
$class->addAdmin();
$admindetails = $class->get_session();


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
		<form action="" method="post">
	<label>Admin Name:</label>
	<input type="text" name="adminname">
	<p></p>
	<label>Account ID:</label>
	<input type="text" name="account_id"
	><p></p>
	<label>Password:</label>
	<input type="password" name="password">
	<p></p>
	<label>Department:</label>
	<input type="text" name="department">
	<p></p>
	<input type="submit" name="add" value="Add">
	</form>
	
</body>
</html>