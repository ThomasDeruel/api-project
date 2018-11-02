<?php
include_once'../../helpers/HelpersGlobal.php';
class Musics extends HelpersGlobal{
    private $_conn;
    private $_table = "musics";
    
    public function __construct($db){
        $this->_conn = $db;
    }

    public function read(){
        $query = "SELECT `id`,`title`,`group` 
                  FROM {$this->_table}
                  ORDER BY `id` ASC";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute();
        $this->arrayCount($stmt);//returns true & "success" of your data if verified, or error
        $this->newData($stmt);// creates a new key :"data"
        return $this->data;
    }

    public function readById($id){
        $query = "SELECT `id`, `title`, `group`
                 FROM {$this->_table}
                 WHERE `id` = `:id`";
        $stmt = $this->_conn->prepare($query);
        $stmt = bindParam(':id', $id, PDO::PARAM_INT);
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