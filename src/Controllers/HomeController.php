<?php
namespace App\Controllers;
use Twig\Environment;
$role = $_SESSION['user']['role'] ?? '/login';
class HomeController
{

    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function admin()
    {
        echo $this->twig->render("admin/dashboard.html.twig");
    }
    public function listadmin()
    {
        echo $this->twig->render("admin/ListCondidate.html.twig");
    }
    public function candidat()
    {
        echo $this->twig->render("candidate/dashboard.html.twig");
    }
    public function recruteur()
    {
        echo $this->twig->render("recruteur/dashboard.html.twig");
    }


    public function register()
{
    echo $this->twig->render('auth/register.html.twig', [
        'errors' => $_SESSION['errors_register'] ?? []
    ]);
    

    unset($_SESSION['errors_register']);
}



    public function index()
    {

        require_once __DIR__ . '/../Views/Home/index.html.twig';
    }

    public function login()
    {

        // require_once __DIR__ . '/../Views/auth/login.html.twig';
        echo $this->twig->render('auth/login.html.twig', [
        'errors' => $_SESSION['error_login'] ?? []
    ]);

        unset($_SESSION['error_login']);


    }
    public function verification(){
        echo $this->twig->render('auth/verification.html.twig');
    }
}