<?php
    class Profile extends Controller {

        public $CustomerModel;

        public function __construct(){
            $this->CustomerModel = $this->model("CustomerModel");
        }

        public function show()
        {
            if (isset($_SESSION['signedIn'])) {
                $this->view("layout1",[
                    "page" => "bodyProfile",
                    "profile"=> $this->CustomerModel->getProfileCustomer()
                ]);
            }else {
                header("location: /Hotel/SignIn");
            }
        }
    }

?>