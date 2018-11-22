<?php
include_once'../../helpers/HelpersGlobal.php';
class Songs extends HelpersGlobal{
    private $_conn;
    private $_table = "songs";
    
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
        $arrayTracks = $this->readTrack();  
        $this->newData($stmt,$arrayTracks);// creates a new key :"data"
        return $this->data;
    }
    private function readTrackById($id){
        $query = "SELECT
                tr.id as id,
                ty.name as `type`,
                tr.id_instrument,
                tr.id_song,
                tr.id_type
                FROM tracks tr
                LEFT JOIN types as ty ON tr.id_type = ty.id
                WHERE tr.id_song = :id
                ";
        $stmt = $this->_conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $tracks = $stmt->fetchAll();
        foreach($tracks as $key => $value) {
            $tracks[$key]['instruments'] = array();
            $query = "SELECT
                `id`,
                `name`
                FROM instruments ins
                WHERE ins.id_tracks = {$value['id_instrument']};
                ";
            $stmt2 = $this->_conn->prepare($query);
            $stmt2->execute();

            $sources = $this->listSourceById($value['id_instrument']);

            while($row = $stmt2 ->fetch()){
                $newData = array();
                $newData = array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "sources" => $sources
                );
                array_push($tracks[$key]['instruments'],$newData);
            }    
        }
        return $tracks;               
    }
    public function listSourceById($id_instrument){
        $query = "SELECT
        src,
        type
        FROM source
        WHERE id_instrument = {$id_instrument}
        ";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    private function readTrack(){
        $query = "SELECT
                tr.id as id,
                ty.name as `type`,
                tr.id_instrument,
                tr.id_song,
                tr.id_type
                FROM tracks tr
                LEFT JOIN types as ty ON tr.id_type = ty.id
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
                WHERE ins.id_tracks = {$value['id_instrument']};
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
        return $tracks;
    }
    public function readById($id){
        $query = "SELECT 
                `id`, 
                `title`, 
                `group`
                 FROM {$this->_table}
                 WHERE `id` = :id ";
        $stmt = $this->_conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $this->arrayCount($stmt);//returns true & "success" of your data if verified, or error
        $arrayTracks = $this->readTrackById($id);
        $this->newData($stmt,$arrayTracks);// creates a new key :"data"
        return $this->data;
    }

    private function newData($stmt,$arrayTracks){     
        $this->data['data'] = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $newData = array(
                "id"=> $row['id'],
                "title" => $row['title'],
                "music_groupe" => $row['group']
            );
            $newData['tracks'] = array();
            foreach($arrayTracks as $key => $value){
                $tracks = array();
                if($value['id_song'] ==  $id){     
                    $tracks = array(
                    "id" => $value['id_type'],
                    "type" => $value['type'],
                    "instruments" => $value['instruments']
                );
                array_push($newData['tracks'],$tracks);
               }    
            }
            array_push($this->data['data'],$newData);
        }
    }
}