<?php
    class Signup extends Controller{

       public $UserModel;

        public function __construct(){
            $this->UserModel = $this->model("CustomerModel");
        }

        function show(){
            $this->view("layout1", ["page"=>"formSignUp"]);
        }

        function actionSignUp(){
            if (isset($_POST['signUp'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // insert data
                echo $this->UserModel->insertUser($username,$password);
                
            }
        }
    }

?>