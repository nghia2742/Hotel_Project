<?php

class SignIn extends Controller{

    public $CustomerModel;

    public function __construct(){
        $this->CustomerModel = $this->model("CustomerModel");
    }

    function Show(){        
        $this->view("layout1", ["page"=>"formSignIn"]);
    }
}
?>