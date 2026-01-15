<?php
require '../vendor/autoload.php';
session_start();
use App\Routers\Router;
use App\Controllers\HomeController;
$role = $_SESSION['user']['role'] ?? '/login';
$router = new Router();
$router->get(HomeController::class,'index','/');
$router->get(HomeController::class,'login','/login');
$router->get(HomeController::class,'register','/register');
$router->get(HomeController::class,"dashboard","/$role");
$router->dispatch();