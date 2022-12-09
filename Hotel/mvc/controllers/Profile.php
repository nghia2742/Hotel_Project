<?php
    class Profile extends Controller {

        public $CustomerModel;

        public function __construct(){
            $this->CustomerModel = $this->model("CustomerModel");
        }

        public function show()
        {
            $this->view("layout1",[
                "page" => "bodyProfile",
                "profile"=> $this->CustomerModel->getProfileCustomer()
            ]);
        }
    }

?>