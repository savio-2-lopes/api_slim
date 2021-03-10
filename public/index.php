<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
session_start();

$settings = require __DIR__ . '/../app/settings.php';
$app = AppFactory::create($settings);

require __DIR__ . '/../app/dependencies.php';
require __DIR__ . '/../app/middlewares.php';
require __DIR__ . '/../app/routes.php';

$app->run();
