<?php

require_once('formclass.php');

session_start();
session_unset();
session_destroy();
?>
 <script>
 	alert("You've been disconnected to server! \n Please log in again for security!");
 	window.location.href='adminlogin.php';


 </script>
 <?php

?>