<?php 
include "db_connect.php";

if(isset($_POST['id'])){
   $id =  $_POST['id'];

   $sql = "DELETE FROM registered_users WHERE user_id=".$id;
   mysqli_query($conn,$sql);
   echo 1;
   exit;
}

echo 0;
exit;