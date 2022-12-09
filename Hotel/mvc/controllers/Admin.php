<?php

    class Admin extends Controller{

        public $RoomModel;

        public function __construct(){
            $this->RoomModel = $this->model("RoomModel");
        }

        function Show(){        
            // Call Models
    
            // Call Views
            $this->view("layout2", ["page"=>"dashboard"]);
        }

        function Rooms(){   
                
            // Call Views
            $this->view("layout2", ["page"=>"rooms"
            ]);

        }

        function actionRoom(){   
            if (isset($_POST['action'])) {
                if ($_POST['action'] == "add") {
                    $nameRoom = $_POST['nameRoom'];
                    $kind = $_POST['kind'];
                    $image = $_POST['image'];
                    $price = $_POST['price'];
                    $status = $_POST['status'];
                    
                    // insert data
                    $resultInsert = $this->RoomModel->insertRoom($nameRoom, $kind, $image , $price , $status);
                }
                if ($_POST['action'] == "delete") {
                    $id = $_POST['id'];
                    $resultDelete = $this->RoomModel->deleteRoom($id);
                }
                if ($_POST['action'] == "edit") {
                    $id = $_POST['id'];
                    $nameRoom = $_POST['nameRoom'];
                    $kind = $_POST['kind'];
                    $image = $_POST['image'];
                    $price = $_POST['price'];
                    $status = $_POST['status'];

                    $resultEdit = $this->RoomModel->editRoom($id,$nameRoom, $kind, $image , $price , $status);
                }
            }
            // show
            $this->view("layout2", ["page"=>"rooms",
                                    "insertRoom"=> $resultInsert,
                                    "deleteRoom"=> $resultDelete,
                                    "editRoom"=> $resultEdit
                                    ]);  
               
        }


    }
?>