<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    HomeController,
    AboutController,
    AuthController,
    TransactionController,
    ReceiptController,
    ErrorController
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
    $app->get('/transaction/{transaction}', [TransactionController::class, 'editView'])->add(AuthRequiredMiddleware::class); // Edit TRANSACTION
    $app->post('/transaction/{transaction}', [TransactionController::class, 'edit'])->add(AuthRequiredMiddleware::class); // Save TRANSACTION
    $app->delete('/transaction/{transaction}', [TransactionController::class, 'delete'])->add(AuthRequiredMiddleware::class); // Delete TRANSACTION
    $app->get('/transaction/{transaction}/receipt', [ReceiptController::class, 'uploadView'])->add(AuthRequiredMiddleware::class); // Prepare RECEIPT
    $app->post('/transaction/{transaction}/receipt', [ReceiptController::class, 'upload'])->add(AuthRequiredMiddleware::class); // Upload RECEIPT
    $app->get('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'download'])->add(AuthRequiredMiddleware::class); // Prepare to GET RECEIPT
    $app->delete('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'delete'])->add(AuthRequiredMiddleware::class); // Prepare to GET RECEIPT

    $app->setErrorHandler([ErrorController::class, 'notFound']);
}
