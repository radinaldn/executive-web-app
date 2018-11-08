<?php
header('Access-Control-Allow-Origin: *');

$conn = new mysqli("localhost", "root", "T1e2k3n4i5k6", "test-executive-app");
if($conn->connect_error){
	die("Could not connect to database!");
}


$action = 'read';

if(isset($_GET['action'])){
	$action = $_GET['action'];
}


if($action == 'read'){
	$result = $conn->query("SELECT * FROM `mahasiswa`");
	$users = array();

	while($row = $result->fetch_assoc()){
		array_push($users, $row);
	}

	$res['mahasiswa'] = $users;
}

$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();