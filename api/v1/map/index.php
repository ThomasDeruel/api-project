<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once'../../config/Database.php';
include_once'../../models/Map.php';

$database = new Database();//prepare connection to pdo
$pdo = $database->connect();// connected to pdo

$map = new Map($pdo); // get

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $read = $map->readById($id);
}else{
    $read = $map->read();
}

echo json_encode($read);