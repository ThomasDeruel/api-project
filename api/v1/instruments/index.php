<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once'../../config/Database.php';
include_once'../../models/Instruments.php';

$database = new Database();//prepare connection to pdo
$pdo = $database->connect();// connected to pdo

$instruments = new Instruments($pdo); // get

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $read = $instruments->readById($id);
}else{
    $read = $instruments->read();
}

echo json_encode($read);