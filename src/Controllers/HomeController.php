<?php
namespace App\Controllers;
$role = $_SESSION['user']['role'] ?? '/login';
class HomeController {
    public function dashboard(){
        global $role;
        require_once __DIR__ . "/../Views/$role/dashboard.php";

    }
    public function index(){
        require_once __DIR__ . '/../Views/Home/index.php';
    }

    public function login(){
        
        require_once __DIR__ . '/../Views/auth/login.php';

    }
}