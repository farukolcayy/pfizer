<?php 
$liveId = $_POST['liveId'];
$data = array();

//database details
$dbHost     = 'localhost';
$dbUsername = 'pfizerkariyer_pfizerkariyer';
$dbPassword = '2021pfizer?';
$dbName     = 'pfizerkariyer_pfizerkariyer';

//create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
$db->set_charset("utf8");
if ($db->connect_error) {
    die("Bağlantı hatası: " . $db->connect_error);
}

//get user data from the database
$query = $db->query("SELECT * FROM livestreamlink where Id=1;");

if ($query->num_rows > 0) {
    $userData = $query->fetch_assoc();
    $data['status'] = 'ok';
    $data['result'] = $userData;
} else {
    $data['status'] = 'err';
    $data['result'] = '';
}

//returns data as JSON format
echo json_encode($data);
