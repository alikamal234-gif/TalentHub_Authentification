<?php

use App\Services\AuthService;
class AuthController {

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $email = $_POST['email'];
            $password = $_POST['passowrd'];
            $checkLogin = new AuthService();
            if(!$checkLogin->checkEmail($email)){
                return;
            }
            if(!$checkLogin->exictEmail($email)){
                return;
            }
            $success = $checkLogin->checkPassword($email,$password);
            if($success){
                $role = $_SESSION['user']['role'];
                header("Location: /$role");
            }
            
        }
    }
}