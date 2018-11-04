<?php
include_once'../../helpers/HelpersGlobal.php';
class Musics extends HelpersGlobal{
    private $_conn;
    private $_table = "musics";
    
    public function __construct($db){
        $this->_conn = $db;
    }

    public function read(){
        $query = "SELECT
                  `id`,
                  `title`,
                  `group`
                  FROM {$this->_table};";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute();
        $this->arrayCount($stmt);//returns true & "success" of your data if verified, or error
        $this->readTrack();
        $this->newData($stmt);// creates a new key :"data"
        return $this->data;
    }
    public function readTrack(){
        $query = "SELECT
                tr.id as id,
                ty.name as `type`,
                tr.instrument_id
                FROM tracks tr
                LEFT JOIN types as ty ON tr.melody_id = ty.id
                ";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute();
        $tracks = $stmt->fetchAll();
        foreach($tracks as $key => $value) {
            $tracks[$key]['instruments'] = array();
            $query = "SELECT
                `id`,
                `name`
                FROM instruments ins
                WHERE ins.id_tracks = {$value['instrument_id']};
                ";
            $stmt2 = $this->_conn->prepare($query);
            $stmt2 ->execute();
            while($row = $stmt2 ->fetch()){
                $newData = array();
                $newData = array(
                    "id" => $row['id'],
                    "name" => $row['name']
                );
                array_push($tracks[$key]['instruments'],$newData);
            }    
        }
        echo '<pre>';
        print_r($tracks);
        echo '</pre>';
    }
    public function readById($id){
        $query = "SELECT 
                `id`, 
                `title`, 
                `group`,
                `id_track`
                 FROM {$this->_table}
                 WHERE `id` = :id ";
        $stmt = $this->_conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $this->arrayCount($stmt);//returns true & "success" of your data if verified, or error
        $this->newData($stmt);// creates a new key :"data"
        return $this->data;
    }

    private function newData($stmt){
        $this->data['data'] = array();
        while($row = $stmt->fetch()){
            $newData = array(
                "id"=> $row['id'],
                "title" => $row['title'],
                "music_groupe" => $row['group']
            );
            array_push($this->data['data'],$newData);
        }
    }
}