<?php
include_once'../../helpers/HelpersGlobal.php';

class Instruments extends HelpersGlobal{
    private $_conn;
    private $_table = "instruments";

    public function __construct($db){
        $this->_conn = $db;
    }
    public function readById($id) {
        $query = "SELECT
                 `id`,
                 `name`,
                 `year`,
                 `title`,
                 `videoURL`,
                 `type`,
                 `origin`,
                 `pronounciation`,
                 `shape`,
                 `descriptionTitle`,
                 `descriptionContent`,
                 `audioPath`,
                 `audioType`
                 FROM {$this->_table}
                 WHERE `id` = {$id};";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute() /*|| print_r( $stmt->errorInfo())*/;
        $this->arrayCount($stmt);
        $this->newData($stmt);// creates a new key :"data"
        return $this->data;  
    }
    public function read(){
        $query = "SELECT
                 `id`,
                 `name`,
                 `year`,
                 `title`,
                 `videoURL`,
                 `type`,
                 `origin`,
                 `pronounciation`,
                 `shape`,
                 `descriptionTitle`,
                 `descriptionContent`,
                 `audioPath`,
                 `audioType`
                 FROM {$this->_table};";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute() /*|| print_r( $stmt->errorInfo())*/;
        $this->arrayCount($stmt);
        $this->newData($stmt);// creates a new key :"data"
        return $this->data;
    }

    private function newData($stmt) {
        $this->data['data'] = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $newData = array(
                "id"=> $row['id'],
                "name" => $row['name'],
                "pronounciation" => $row['pronounciation'],
                "type" => $row['type'],
                "origin" => $row['origin'],
                "description" =>  array(
                    "title" => $row['descriptionTitle'],
                    "content" => $row['descriptionContent']
                ),
                "artists" => "a faire :)",
                "title" => $row['title'],
                "sound" => array(
                    "filePath" => $row['audioPath'],
                    "type" => $row['audioType']
                ),
                "videoUrl" => $row['videoURL']
            );
            array_push($this->data['data'],$newData);
        }
    }
}