<?php 
//The logout function
session_start();
session_destroy();
	header('location:admin.php');
?>