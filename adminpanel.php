<?php
session_start();
require_once("formclass.php");





  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #111;">
  <div class="container-fluid">

<a href="addadmin.php">CLICK HERE TO ADD NEW ADMIN</a>
<a href="adminmain.php">Pendings</a>
<a href="approved.php">APPROVED</a>
<a href="denied.php">DENIED</a>
<a href="logout.php">LOGOUT</a>
</div>
</nav>
</body>
</html>
