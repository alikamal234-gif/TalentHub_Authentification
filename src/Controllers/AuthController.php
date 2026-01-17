<?php
namespace App\Controllers;
use App\Services\AuthService;
use App\Repositories\UserRepository;
use App\Models\User;
use App\Models\Role;
class AuthController
{
    private $checkLogin;
    private $UserController;

    public function __construct()
    {
        $this->checkLogin = new AuthService();
        $this->UserController = new UserRepository();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!$this->checkLogin->checkEmail($email)) {
                $_SESSION['error_login'] = "structure de email faux";
                return;
            }
            if (!$this->checkLogin->exictEmail($email)) {
                $_SESSION['error_login'] = "no email comme cette structure ";
                return;
            }
            $success = $this->checkLogin->checkPassword($email, $password);
            if ($success) {
                $role = $_SESSION['user']['role'];
                header("Location: $role/dashboard");
            } else {
                $_SESSION['error_login'][] = "Password incorrect";
                
            }
            
            if (!empty($_SESSION['error_login'])) {
                header("Location: login");
                exit;
            }
            

        }
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "password_verify" => $_POST['password_confirm'],
                "role" => $_POST['role']
            ];



            if ($this->checkLogin->exictRole($data['role'])) {
                $role = $this->checkLogin->exictRole($data['role']);
                $Role = new Role($role['id'], $role['name']);
            }



            if (!$this->checkLogin->confirmePassword($data['password'], $data['password_verify'])) {
               $_SESSION['errors_register'][] = "Les mots de passe ne correspondent pas";
            }

            if ($this->checkLogin->isAdmin($role['name'])) {
                $_SESSION['errors_register'][] = "Cette Role ne excist pour toi";
            }

            if (!empty($_SESSION['errors_register'])) {
            header("Location: register");
            exit;
        }

            $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
            $User = new User(null, $data['name'], $data['email'], $passwordHash, $Role);
            $this->UserController->save($User);

            header("Location: login");
        }
    }

    
}