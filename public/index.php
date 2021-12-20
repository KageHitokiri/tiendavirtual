<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/core/bootstrap.php';

use ProyectoWeb\app\controllers\CartController;
use ProyectoWeb\app\controllers\CategoryController;
use ProyectoWeb\app\controllers\ProductController;
use Slim\Views\PhpRenderer;
use ProyectoWeb\app\controllers\PageController;
use ProyectoWeb\app\controllers\UserController;
use ProyectoWeb\core\App;
use ProyectoWeb\core\Cart;

App::bind('rootDir', __DIR__ . '/');

$app = new \Slim\App(APP::get('config')['slim']);

$container = $app->getContainer();
$container["cart"] = new Cart();
$templateVariables = [
    "basePath" => $container->request->getUri()->getBasePath(),
    "userName" => ($_SESSION['username'] ?? ''),
    "withCategories" => true,
    "router" => $container->router,
    "cart" =>$container->cart
];

$container['renderer'] = new PhpRenderer("../src/app/views", $templateVariables);

$app->get('/', PageController::class . ':home')->setName("home");

$app->map(['GET', 'POST'], '/login', UserController::class . ':login')->setName("login");
$app->map(['GET', 'POST'], '/register', UserController::class . ':register');
$app->get('/logout', UserController::class . ':logout');

$app->get('/producto/{nombre}/{id:[0-9]+}', ProductController::class . ':ficha')->setName('ficha');

$app->get("/categoria/{nombre}/{id:[0-9]+}[/page/{currentPage:[0-9]+}]", CategoryController::class . ":listado")->setName("categoria");

$app->get("/cart", CartController::class .":render")->setName("Cart");
$app->get("/cart/add/{id:[0.9]+}[/quantity:[0-9]+}]", CartController::class . ":add")->setName("cart-add");

$app->run();
