<?php
require_once('formclass.php');
$pendings = $class->getPendings();
$status = $class->updateStatus();
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
<?php foreach ($pendings as $pending) {
	

?>
<form method="post" action="">
<div class="container">
<div class="card" style="width: 20rem; padding: 10px; background-color: gray;">
  <div class="card-header">
  	<form method="post">
    <?php echo $pending['user_name']; ?>
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
	
	<input type="hidden" value="<?php $pending['id']?>"	name="id">
	<select name="status">
		<option value=""><?php echo $pending['status'];?></option>
		<option value="denied">DENIED</option>
		<option value="approved">APPROVED</option>
	</select>
	<input name="update" type="submit" value="UPDATE">
	</form>
	</div>




  <?php } ?>

</body>
</html>