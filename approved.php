<?php
session_start();
require_once('formclass.php');
$approved = $class->getApproved();

if(!isset($_SESSION)){
  header("Location: adminlogin.php");
  }
  echo "welcome". $_SESSION['adminname'];
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<h1>APPROVED REQUESTS</h1>
<?php
switch ($approved) {
	case null:
		echo "empty";
		break;
	
	default:
 foreach ($approved as $row) {
	

?>
<form method="post" action="">
<div class="container">
<div class="card" style="width: 20rem; padding: 10px; background-color: gray;">
  <div class="card-header">
  	<form method="post">
    <?php echo $row['user_name']; ?>
  </div>
  <ul class="list-group list-group-flush">
  	
    <li class="list-group-item"><?php echo $row['req_dept']; ?></li>
    <li class="list-group-item"><?php echo $row['contact']; ?></li>
    <li class="list-group-item"><?php echo $row['dept_head_fullname']; ?></li>
    <li class="list-group-item"><?php echo $row['euser_fullname']; ?></li>
    <li class="list-group-item"><?php echo $row['position']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_type']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_num']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_issues']; ?></li>
    <li class="list-group-item"><?php echo $row['required_services']; ?></li>
    <li class="list-group-item"><?php echo $row['date_added']; ?></li>
  </ul>
</div>
	
	<input type="hidden" value="<?php $row['id']?>"	name="id">
	<select name="status">
		<option value=""><?php echo $row['status'];?></option>
		<option value="denied">DENIED</option>
		<option value="approved">APPROVED</option>
	</select>
	<input name="update" type="submit" value="UPDATE">
	</form>
	</div>
 <?php
}
		break;



  } ?>

</body>
</html>