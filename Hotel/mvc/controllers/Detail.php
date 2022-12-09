<?php

class Detail extends Controller{

    public $RoomModel;

    public function __construct(){
        $this->RoomModel = $this->model("RoomModel");
    }

    function Show(){        
        // Call Views
        if(isset($_POST['detailPage'])){
            $id = $_POST['detailPage'];
            $_SESSION['detailRoom'] = $id;
        }
        $this->view("layout1", ["page"=>"bodyDetail",
                                "detailRoom"=>$this->RoomModel->detailRoom($_SESSION['detailRoom'])
                                ]);
    }

    public function Confirmation()
    {
        $this->view("layout1", ["page"=>"bodyDetail2"
                                ]);
    }

    public function Result()
    {
        $this->view("layout1", ["page"=>"bodyDetail3"
                                ]);
    }
}
?>