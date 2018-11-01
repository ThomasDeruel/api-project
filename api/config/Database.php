<?php
include_once'../../helpers/HelpersGlobal.php';
class Database extends HelpersGlobal{
    private $_username = 'root';
    private $_password = 'root';
    private $_host = 'localhost';
    private $_dbname = 'exoprod';
    private $_pdo;

    public function connect(){
        try{
            $this->_pdo = new PDO("mysql:host=".$this->_host.";dbname=".$this->_dbname,$this->_username,$this->_password);
        }catch(PDOException $e){
           $this->error("error connection to database: ".$e->getMessage());
        }
        return $this->_pdo; 
    }
}