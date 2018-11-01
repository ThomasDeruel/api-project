<?php
class HelpersGlobal{

    protected $data;

    protected function arrayCount($stmt){
        if($stmt->rowCount() === 0 ){
            $this->error('No data');
        }else{
            $this->success();
        }
    }
    protected function error(string $msg){
        $this->data['success'] = false;
        $this->data['message'] = $msg;
        die(json_encode($this->data));
    }
    protected function success(){
        $this->data['success'] = true;
        $this->data['message'] = "success"; 
    }
}