<?php

$app->get('/', 'HomeController:index')->setName('home');

$app->group('/auth', function ($app) {
    $this->map(['GET', 'POST'], '/login', 'AuthController:login')->setName('auth.login');
    $this->map(['GET', 'POST'], '/register', 'AuthController:register')->setName('auth.register');
});
