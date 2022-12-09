<?php

class Home extends Controller{

    public $CustomerModel;

    public function __construct(){
        $this->CustomerModel = $this->model("CustomerModel");
    }

    function Show(){        
        $this->CustomerModel->getProfileCustomer();
        $this->view("layout1", ["page"=>"bodyHome"]);
    }
}
?>