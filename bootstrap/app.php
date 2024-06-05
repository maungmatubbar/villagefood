<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'seller' => \App\Http\Middleware\SellerMiddleware::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'approved_seller' => \App\Http\Middleware\ApproveSeller::class,
            'customer' => \App\Http\Middleware\CustomerMiddleware::class,
        ]);
        $middleware->web(append: [
            \App\Http\Middleware\LanguageMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
return $app;
//dd($app);
