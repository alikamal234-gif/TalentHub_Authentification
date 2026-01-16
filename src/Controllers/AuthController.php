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
                $_SESSION['error_message'] = "structure de email faux";
                return;
            }
            if (!$this->checkLogin->exictEmail($email)) {
                $_SESSION['error_message'] = "no email comme cette structure ";
                return;
            }
            $success = $this->checkLogin->checkPassword($email, $password);
            if ($success) {
                $role = $_SESSION['user']['role'];
                header("Location: $role/dashboard");
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
                $_SESSION['error_message'] = "password is failed";
                return;
            }

            if($this->checkLogin->isAdmin($role['name'])){
                $_SESSION['error_message'] = "Role is not here";
                $role_test = $role['name'];
                echo "<script>alert('$role_test')</script>";
                return;
            }
            
            $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
            $User = new User(null, $data['name'], $data['email'], $passwordHash, $Role);
            $this->UserController->save($User);

            header("Location: login");
        }
    }

}