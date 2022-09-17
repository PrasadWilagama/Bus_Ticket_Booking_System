<?php
    // This file connects and retrieves data from registered_users table
include 'db_connect.php';

$qry = $conn->query("SELECT * FROM registered_users");
$data = array();
while($row = $qry->fetch_assoc()){
	$data[]= $row;
}
echo json_encode($data);


