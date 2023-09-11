<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    HomeController,
    AboutController,
    AuthController
};
use App\Middleware\{
    AuthRequiredMiddleware,
    GuestOnlyMiddleware
};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class); // Display HOME
    $app->get('/about', [AboutController::class, 'about']); // Display ABOUT
    $app->get('/register', [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class); // Display REGISTER
    $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class); // REGISTER
    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class); // Display LOGIN
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class); // LOGIN
    $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class); // LOGOUT
}
