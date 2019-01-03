<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once'../../config/Database.php';
include_once'../../models/Songs.php';

$database = new Database();//prepare connection to pdo
$pdo = $database->connect();// connected to pdo

$songs = new Songs($pdo); // get

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $read = $songs->readById($id);
}else{
    $read = $songs->read();
}

echo json_encode($read);