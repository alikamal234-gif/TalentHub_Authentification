<?php

namespace App\Services;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
class AuthService {
    private $UserRepository;
    private $RoleRepository;
    public function __construct() {
        $this->UserRepository = new UserRepository();
        $this->RoleRepository = new RoleRepository();
    }
    public function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }
    
    public function checkPassword($email,$passwordUser){
        $data = $this->UserRepository->findByEmail($email);
        if(password_verify($passwordUser,$data['password'])){
            $role =$this->RoleRepository->getRoleBy($data['role_id']);
            $_SESSION['user'] = [
                'id' => $data['id'],
                'email' => $data['email'],
                'role' => $role['name']
            ];
            return true;
        }
    }

    public function exictEmail($email){
        
        $exict = $this->UserRepository->findByEmail($email);
        if($exict){
            return true;
        }
    }

    public function exictRole($id){
        if($this->RoleRepository->getRoleBy($id)){
            $role = $this->RoleRepository->getRoleBy($id);
            return $role;
        }
    }


    public function confirmePassword($password,$confirme){
        if($password == $confirme){
            return true;
        }
    }

    
}