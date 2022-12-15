<?php

class Detail extends Controller{

    public $RoomModel;
    public $test;

    public function __construct(){
        $this->RoomModel = $this->model("RoomModel");
    }

    function Show(){        
        // Call Views
        
        if(isset($_POST['detailPage'])){
            $_SESSION['detailRoom'] = $_POST['detailPage'];
        }

        $this->view("layout1", ["page"=>"bodyDetail",
                                    "detailRoom"=>$this->RoomModel->detailRoom($_SESSION['detailRoom'])
                                    ]);
    }

    public function Confirmation()
    {
        if(isset($_SESSION['detailRoom'])){
            
            $this->view("layout1", ["page"=>"bodyDetail2",
            "detailRoom"=>$this->RoomModel->detailRoom($_SESSION['detailRoom'])
            ]);
        }
        else {
            header("location: /Hotel/Booking");
        }
    }

    public function Result()
    {
        if(isset($_SESSION['detailRoom'])){
            $this->view("layout1", ["page"=>"bodyDetail3",
            "detailRoom"=>$this->RoomModel->detailRoom($_SESSION['detailRoom']),
            ]);
        }
        else {
            header("location: /Hotel/Booking");
        }
    }
}
?>