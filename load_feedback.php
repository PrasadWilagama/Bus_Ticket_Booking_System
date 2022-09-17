<?php
    // This file connects and retrieves data from feedback table
include 'db_connect.php';

$qry = $conn->query("SELECT * FROM feedback");
$data = array();
while($row = $qry->fetch_assoc()){
	$data[]= $row;
}
echo json_encode($data);

?>