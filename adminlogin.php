	<?php
require_once('formclass.php');
$class->adminLogin();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JobRequestAdmin</title>
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
	<input type="password" name="password"><p></p>
	<input type="submit" name="submit" value="Enter">
	</form>
</body>
</html>