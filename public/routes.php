<?php

// define routes

$routes = array(
    array(
        "pattern" => "react",
        "controller" => "home",
        "action" => "react"
    ),
    array(
        "pattern" => "admin",
        "controller" => "home",
        "action" => "index"
    ),
    array(
        "pattern" => "home",
        "controller" => "home",
        "action" => "index"
    ),
    array(
        "pattern" => "login",
        "controller" => "auth",
        "action" => "login"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
