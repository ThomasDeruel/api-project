<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once'../../config/Database.php';
include_once'../../models/Musics.php';

$database = new Database();//prepare connection to pdo
$pdo = $database->connect();// connected to pdo

$musics = new Musics($pdo); // get

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $read = $musics->readById($id);
}else{
    $read = $musics->read();
}


echo json_encode($read);