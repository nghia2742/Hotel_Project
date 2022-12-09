<?php

class Booking extends Controller{

    public $RoomModel;

    public function __construct(){
        $this->RoomModel = $this->model("RoomModel");
    }

    function Show(){        
        
        if (!isset($_SESSION['currency'])) {
            $_SESSION['currency'] = 1;
            $_SESSION['currencySign'] = "&dollar;";
        }
        
        $this->view("layout1",[
            "page" => "bodyBooking",
            "listLocation"=>$this->RoomModel->listAllLocation()
        ]);

        // $this->view("layout1", ["page"=>"bodyBooking"]);
    }
}
?>