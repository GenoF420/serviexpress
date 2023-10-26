<?php

$router = new \Bramus\Router\Router();

$router->get("/", function () {
    echo Session::getInstance()->__get("UserID");
});

$router->mount("/dashboard", function () use ($router) {

});

//Authentication Middleware
$router->before("GET|POST", "/dasboard/.*", function () {

});

$router->run();