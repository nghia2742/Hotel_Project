<?php

class Test extends Controller{

    public $RoomModel;

    public function __construct(){
        $this->RoomModel = $this->model("RoomModel");
    }

    function Show(){  
        $this->view("layout",[
            "page" => "test"
        ]);
        

    }

    public function searchRoom(){
        if (isset($_POST['search'])) {
            $location = $_POST['location'];
            $dateFrom = $_POST['dateFrom'];
            $dateTo = $_POST['dateTo'];
            $adult = $_POST['adult'];
            $children = $_POST['children'];

            $obj = [$location, $dateFrom, $dateTo, $adult, $children];
            echo print_r($obj);
            // $this->RoomModel->setFilter($location);
            

        }

    }






}
