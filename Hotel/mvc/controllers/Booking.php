<?php

class Booking extends Controller{

    public $RoomModel;

    public function __construct(){
        $this->RoomModel = $this->model("RoomModel");
    }

    function Show(){        
        
        $this->view("layout1",[
            "page" => "bodyBooking",
            "listLocation"=>$this->RoomModel->listAllLocation()
        ]);

    }
}
?>