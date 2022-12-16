<?php

class CustomerModel extends DB{

    public $idCustomer;

    public function listAll(){
        $sql = "SELECT * FROM tb_customers";
        $rows = mysqli_query($this->con, $sql);
        $list = array();

        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }
    
        return $list;
    }

    public function checkCustomerSignIn($email,$password){
        $result = false;
        $sql = "SELECT * FROM tb_customers WHERE `email` LIKE '$email'  AND `password` LIKE '$password' AND `member` = 1";
        $rows = mysqli_query($this->con, $sql);
        $list = array();

        while ($row = mysqli_fetch_array($rows)) {
            $list[] = $row;
        }
        if (count($list)>0) {
            $_SESSION['idCustomer'] = $list[0]['id_customer'];
            $_SESSION['signedIn'] = 'true';
            $result=true;
        }
        return $result;
    }

    public function getProfileCustomer(){
        if (isset($_SESSION['signedIn'])) {
            $sql = "SELECT * FROM tb_customers WHERE id_Customer = ".$_SESSION['idCustomer']."";
            $rows = mysqli_query($this->con, $sql);

            while ($row = mysqli_fetch_array($rows)) {
                $_SESSION['idCus'] = $row['id_customer'];
                $_SESSION['nameCus'] = $row['name'];
                $_SESSION['emailCus'] = $row['email'];
                $_SESSION['phoneCus'] = $row['phone'];
            }
        }
    }

    public function getIdCustomer($email){
        $id = 0;
        $sql = "SELECT *  FROM `tb_customers` WHERE `email` LIKE '$email'";
        $customer = mysqli_query($this->con,$sql);
        $row = mysqli_fetch_array($customer);
        if (isset($row['id_customer'])) {
            $id = $row['id_customer'];
        }
        return $id;
    }

    public function updatePassword($curPass, $newPass) {
        $isPass= "SELECT * FROM `tb_customers` WHERE password = '$curPass' AND id_customer = ".$_SESSION['idCustomer']."";
        if (mysqli_query($this->con, $isPass)->num_rows < 1) {
            return false;  
        }
        $sql = "UPDATE tb_customers SET `password` = '$newPass' WHERE id_customer = ".$_SESSION['idCustomer']."";
        if (mysqli_query($this->con, $sql)) {
            return true;
        }
        return false;
    }

    public function updateProfile($name, $email, $phone) {
        $sql = "UPDATE tb_customers 
        SET `name` = '$name', `phone` = '$phone' 
        WHERE email = '$email'";
        if (mysqli_query($this->con, $sql)) {
            return 'true';
        }
        return 'false';
    }
    
    public function addNewCustomer($name,$email,$phone,$password,$member){
        $result = true;

        $sql = "SELECT *  FROM `tb_customers` WHERE `email` LIKE '$email' AND `member` = 0";
        $isEmail = mysqli_query($this->con,$sql);

        if ($isEmail->num_rows > 0) {
            mysqli_query($this->con,
            "UPDATE `tb_customers` 
            SET `password`='$password',
                `name`='$name',
                `phone`='$phone',
                `member`= 1 
            WHERE `email`='$email'");
            return true;
        }


        $sql1 = "SELECT *  FROM `tb_customers` WHERE `email` LIKE '$email'";
        $isEmail = mysqli_query($this->con,$sql1);

        if ($isEmail->num_rows > 0) {
            return false;
        }
        $sql2 = "INSERT INTO `tb_customers` ( `name`, `email`, `phone`, `password`, `member`) VALUES ('$name', '$email','$phone', '$password',$member);";
        if (mysqli_query($this->con,$sql2)) {
            $result = true;
        };
        return $result;
    }

}

?>