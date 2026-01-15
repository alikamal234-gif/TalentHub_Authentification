<?php

namespace App\Services;
use App\Repositories\UserRepository;
class AuthService {

    public function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }
    
    public function checkPassword($email,$passwordUser){
        $UserRepository = new UserRepository();
        $data = $UserRepository->findByEmail($email);
        if(password_verify($passwordUser,$data['password'])){
            $_SESSION['user'] = [
                'id' => $data['id'],
                'email' => $data['email'],
                'role' => $data['role']
            ];
            return true;
        }
    }

    public function exictEmail($email){
        $UserRepository = new UserRepository();
        $exict = $UserRepository->findByEmail($email);
        if($exict){
            return true;
        }
    }

    

    
}