<?php
    // This file connects and retrieves data from report table
include 'db_connect.php';


//Using inner joins to join multiple tables
$qry = $conn->query("SELECT booked.name AS customer_name, bus.name AS bus_name, bus.bus_number, schedule_list.departure_time, location.terminal_name,
booked.qty AS num_of_tickets FROM booked
JOIN schedule_list ON booked.schedule_id = schedule_list.id
JOIN bus ON schedule_list.bus_id = bus.id
JOIN location ON schedule_list.from_location=location.id");

$data = array();
while($row = $qry->fetch_assoc()){
	$data[]= $row;
}
echo json_encode($data);

?>