<?php
include_once'../../helpers/HelpersGlobal.php';
class Map extends HelpersGlobal{
    private $_conn;
    private $_table = "map";

    public function __construct($db){
        $this->_conn = $db;
    }

    public function read(){
        $query = "SELECT
                map.id as id,
                map.markerOffset,
                map.name,
                map.lat,
                map.lng,
                instr.id as `id_instrument`,
                instr.name as `instrumentName`
                FROM {$this->_table}
                LEFT JOIN instruments as instr ON map.id_instrument = instr.id
                ;";
        $stmt = $this->_conn->prepare($query);
        $stmt->execute();
        $this->arrayCount($stmt);
        $this->newData($stmt);// creates a new key :"data"
        return $this->data;
    }

    private function newData($stmt) {
        $this->data['data'] = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $newData = array(
                "id"=> $row['id'],
                "instrument" => array(
                    "id" => $row['id_instrument'],
                    "name" => $row['instrumentName']
                ),
                "map" => array(
                    "place" => $row['name'],
                    "coordinates" => [$row['lat'],$row['lng']]
                )
            );
            array_push($this->data['data'],$newData);
        }
    }
}