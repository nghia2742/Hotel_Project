<?php
    class SignOut extends Controller{

        function show(){
            unset($_SESSION['signedIn']);
            header('location: /Hotel/Home');
        }

    }
?>