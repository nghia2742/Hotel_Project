<?php

    class Admin extends Controller{

        public $RoomModel;

        public function __construct(){
            $this->RoomModel = $this->model("RoomModel");
        }

        function Show(){        
            if (isset($_SESSION['nameCus']) &&  $_SESSION['nameCus'] == "Admin") {
                $this->view("layout2", ["page"=>"dashboard"]);
            } else {
                header("location: ./Home");
            }
        }

        function Rooms(){   
            $this->view("layout2", ["page"=>"rooms"
            ]);
        }

        function actionRoom(){   
            if (isset($_POST['action'])) {
                if ($_POST['action'] == "add") {
                    $nameRoom = $_POST['nameRoom'];
                    $kind = $_POST['kind'];
                    $rating = $_POST['rating'];
                    $idLocation = $_POST['idLocation'];
                    $adult = $_POST['adult'];
                    $children = $_POST['children'];
                    $bedroom = $_POST['bedroom'];
                    $bathroom = $_POST['bathroom'];
                    $image = $_POST['image'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $status = $_POST['status'];
                    if ($status == 'Available') {
                        $status = 0;
                    } else {
                        $status = 1;
                    }
                    // insert data
                    $resultInsert = $this->RoomModel->insertRoom($nameRoom, $kind, $rating, $idLocation, $adult, $children, $bedroom, $bathroom, $price, $image, $description, $status);
                }
                if ($_POST['action'] == "delete") {
                    $id = $_POST['id'];
                    $resultDelete = $this->RoomModel->deleteRoom($id);
                }
                if ($_POST['action'] == "edit") {
                    $id = $_POST['id'];
                    $nameRoom = $_POST['nameRoom'];
                    $kind = $_POST['kind'];
                    $rating = $_POST['rating'];
                    $idLocation = $_POST['idLocation'];
                    $adult = $_POST['adult'];
                    $children = $_POST['children'];
                    $bedroom = $_POST['bedroom'];
                    $bathroom = $_POST['bathroom'];
                    $image = $_POST['image'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $status = $_POST['status'];
                    if ($status == 'Available') {
                        $status = 0;
                    } else {
                        $status = 1;
                    }

                    $resultEdit = $this->RoomModel->editRoom($id,$nameRoom, $kind, $rating, $idLocation, $adult, $children, $bedroom, $bathroom, $price, $image, $description, $status);
                }
            }
            // show
            $this->view("layout2", ["page"=>"rooms"]);  
               
        }

        function Customers(){   
            $this->view("layout2", ["page"=>"customers"
            ]);
        }

        function History(){   
            $this->view("layout2", ["page"=>"history"
            ]);
        }

        function Reservation(){   
            $this->view("layout2", ["page"=>"reservation"
            ]);
        }

    }
?>