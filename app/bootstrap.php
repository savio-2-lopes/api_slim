<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'blog',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]
    ]
]);

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['view'] = function ($container) {

    $view = new Slim\Views\Twig(__DIR__ . '/../template/views', [
        'cache' => false,
    ]);

    $view->addExtension(new Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));
    return $view;
};

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};

$container['AuthController'] = function ($container) {
    return new App\Controllers\AuthController($container);
};

require_once __DIR__ . './routes.php';
