<?php
include_once'../../helpers/HelpersGlobal.php';
class Artists extends HelpersGlobal{
    private $_conn;
    private $_table = "artists";
    
    public function __construct($db){
        $this->_conn = $db;
    }

    public function read(){
        $query = "SELECT `id`,`title`,`music_group` 
                  FROM {$this->_table}
                  ORDER BY `id` ASC";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute();
        $this->arrayCount($stmt);
        $this->newData($stmt);
        return $this->data;
    }
    /*public function readById($id){
        $this->_params = $id;
    }*/
    private function newData($stmt){
        $this->data['data'] = array();
        while($row = $stmt->fetch()){
            $newData = array(
                "id"=> $row['id'],
                "title" => $row['title'],
                "music_groupe" => $row['music_group']
            );
            array_push($this->data['data'],$newData);
        }
    }
}