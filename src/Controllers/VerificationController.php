<?php
namespace App\Controllers;
use App\Services\AuthService;
use App\Repositories\UserRepository;

class VerificationController {


    private $UserController;

    public function __construct()
    {
        $this->UserController = new UserRepository();
    }

    public function verify() {
        $code_user = $_POST['code'];
        $code_origin = $_SESSION['codeVerification'];

        if ($code_user == $code_origin) {
            $data = $_SESSION['data_temp'];
            unset($_SESSION['codeVerification']);
            $this->UserController->save($data);

            unset($_SESSION['temp_user']);
            unset($_SESSION['codeVerification']);

            header("Location: login");
            exit;
        } else {
            $_SESSION['error_verification'] = "Code incorrect";
            header("Location: verification");
            exit;
        }
    }
}
