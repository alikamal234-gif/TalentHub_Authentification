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
    public function candidate()
    {
        echo $this->twig->render("condidate/dashboard.html.twig");
    }
    public function recruteur()
    {
        echo $this->twig->render("recruteur/dashboard.html.twig");
    }



    public function index()
    {

        require_once __DIR__ . '/../Views/Home/index.html.twig';
    }

    public function login()
    {

        require_once __DIR__ . '/../Views/auth/login.html.twig';

    }
    public function register()
    {

        require_once __DIR__ . '/../Views/auth/register.html.twig';

    }
}