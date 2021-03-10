<?php

require __DIR__ . '/../vendor/autoload.php';
session_start();

$settings = require '/../app/settings.php';
$app = new \Slim\App($settings);

require '/../app/dependencies.php';
require '/../app/middlewares.php';
require '/../app/routes.php';

$app->run();
