<?php
session_start();
require_once('formclass.php');
$pendings = $class->getPendings();
$status = $class->updateStatus();

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
	<h1>PENDING REQUESTS</h1>

<?php 
switch($pendings){
	case null:
	echo "no pending records yet";
	break;
	default:




foreach ($pendings as $pending) {


?>

<div class="container">
<div class="card" style="width: 20rem; padding: 10px; background-color: gray;">
  <div class="card-header">
  	<?php echo $pending['user_name']; ?>
	<h1><?php echo $pending['id']; ?></h1>
    
  </div>
  <ul class="list-group list-group-flush">
  	
    <li class="list-group-item"><?php echo $pending['req_dept']; ?></li>
    <li class="list-group-item"><?php echo $pending['contact']; ?></li>
    <li class="list-group-item"><?php echo $pending['dept_head_fullname']; ?></li>
    <li class="list-group-item"><?php echo $pending['euser_fullname']; ?></li>
    <li class="list-group-item"><?php echo $pending['position']; ?></li>
    <li class="list-group-item"><?php echo $pending['equip_type']; ?></li>
    <li class="list-group-item"><?php echo $pending['equip_num']; ?></li>
    <li class="list-group-item"><?php echo $pending['equip_issues']; ?></li>
    <li class="list-group-item"><?php echo $pending['required_services']; ?></li>
    <li class="list-group-item"><?php echo $pending['date_added']; ?></li>
  </ul>
</div>
		
<form method="get">

	<input type="hidden" name="id" value="<?php echo $pending['id'];?>">
	<select name="status">
		<option selected disabled>---</option>
		<option value="approved">APPROVED</option>
		<option value="denied">DENIED</option>
	</select>
	<input type="submit" name="update" value="UPDATE">
	 <a href="adminmain.php?id=<?=$pending['id']?> "></a>
	</form>
	</div>




  <?php
}
break;

   } ?>

</body>
</html>