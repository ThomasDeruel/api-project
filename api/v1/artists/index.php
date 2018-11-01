<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once'../../config/Database.php';
include_once'../../models/Artists.php';

$database = new Database();//prepare connection to pdo
$pdo = $database->connect();// connected to pdo

$artists = new Artists($pdo); // get 
$read = $artists->read();

echo json_encode($read);