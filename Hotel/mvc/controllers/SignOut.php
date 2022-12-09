<?php
    class SignOut extends Controller{

        function show(){
            unset($_SESSION['signedIn']);
        }

    }
?>