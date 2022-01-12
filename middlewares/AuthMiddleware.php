<?php 

declare(strict_types=1);

use Jasny\Auth\AuthMiddleware;

use Psr\Http\Message\ServerRequestInterface ;

use Laminas\Diactoros\ResponseFactory;

$responseFactory = new ResponseFactory;

$middleware = new AuthMiddleware(
    $auth,
    function (ServerRequestInterface $request) {
        if (strpos($request->getUri()->getPath(), '/account/') === 0) {
            return true; // Pages under `/account/` are only available if logged in
        }
        
        if ($request->getUri()->getPath() === '/sign-up') {
            return false; // It will emmit false if already signed up
        }
    
        return null;
    },
    $responseFactory,
);

