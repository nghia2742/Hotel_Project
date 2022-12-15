<?php

class History extends Controller{

    public $RoomModel;

    public function __construct(){
        $this->RoomModel = $this->model("RoomModel");
    }

    function Show(){
        $history = array();
        if (isset($_SESSION['signedIn'])) {
            $history = $this->RoomModel->getHistory($_SESSION['idCus']);
        }

        $this->view("layout1", ["page"=>"bodyHistory",
                                "listHistory"=>$history]);
    }
}
?>