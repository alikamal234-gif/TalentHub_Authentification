<?php
require '../vendor/autoload.php';
session_start();
use App\Routers\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\VerificationController;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../src/Views');
$twig = new Environment($loader);

$GLOBALS['twig'] = $twig;
$role = $_SESSION['user']['role'] ?? '/login';
$router = new Router();
$router->get(HomeController::class,'index','/');
$router->post(AuthController::class,'register','/register');
$router->get(HomeController::class,'login','/login');
$router->get(HomeController::class,'verification','/verification');
$router->post(VerificationController::class, 'verify', '/verification');
$router->post(AuthController::class,'login','/login');
$router->get(HomeController::class,'register','/register');
$router->get(HomeController::class,"$role","/$role/dashboard");
$router->get(HomeController::class,"list$role","/$role/ListCondidate");
$router->dispatch();