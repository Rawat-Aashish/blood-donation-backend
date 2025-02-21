<?php

use Kakarot\LaravelInitialSetup\Middleware\HandleLocalization;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

use Kakarot\LaravelInitialSetup\Traits\ExceptionHandler;

use Kakarot\LaravelInitialSetup\Traits\RouteHandler;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        then: RouteHandler::configureApiVersioning(),
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(HandleLocalization::class);
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->dontReport([
            MethodNotAllowedHttpException::class,
        ]);
        ExceptionHandler::handleApiException($exceptions);
        //
    })->create();
