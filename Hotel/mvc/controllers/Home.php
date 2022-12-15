<?php

class Home extends Controller{

    public $CustomerModel;

    public function __construct(){
        $this->CustomerModel = $this->model("CustomerModel");
    }

    function Show(){
        if (!isset($_SESSION['currency'])) {
            $_SESSION['currency'] = 1;
            $_SESSION['currencySign'] = "&dollar;";
        }     
        $this->CustomerModel->getProfileCustomer();
        $this->view("layout1", ["page"=>"bodyHome"]);
    }
}
?>