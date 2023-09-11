<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    HomeController,
    AboutController,
    AuthController,
    TransactionController
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
    $app->get('/transaction', [TransactionController::class, 'createView'])->add(AuthRequiredMiddleware::class); // Display TRANSACTION
    $app->post('/transaction', [TransactionController::class, 'create'])->add(AuthRequiredMiddleware::class); // Make TRANSACTION
    $app->get('/transaction/{transaction}', [TransactionController::class, 'editView']); // Edit TRANSACTION
    $app->post('/transaction/{transaction}', [TransactionController::class, 'edit']); // Save TRANSACTION
    $app->delete('/transaction/{transaction}', [TransactionController::class, 'delete']); // Delete TRANSACTION
}
