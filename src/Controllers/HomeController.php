<?php
namespace App\Controllers;
use Twig\Environment;
$role = $_SESSION['user']['role'] ?? '/login';
class HomeController {

     private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    
    public function dashboard(){
        global $role;
        echo $this->twig->render("$role/dashboard.html.twig");
    }
    public function index(){
        
        require_once __DIR__ . '/../Views/Home/index.html.twig';
    }

    public function login(){
        
        require_once __DIR__ . '/../Views/auth/login.html.twig';

    }
    public function register(){
        
        require_once __DIR__ . '/../Views/auth/register.html.twig';

    }
}