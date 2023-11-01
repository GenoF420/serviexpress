<?php

use models\User;
use rawsrc\PhpEcho\PhpEcho;
use Bramus\Router\Router;

$router = new Router();

$router->get("/", function () {
    $tpl = new PhpEcho("index.php");

    echo($tpl);
});

$router->mount("/intranet", function () use ($router) {
    $router->get('/', function () {
        if (Session::getInstance()->Get("user") === null) {
            header("Location: /intranet/login");
            return;
        }

        $tpl = new PhpEcho("intranet/layout.php", ["body" => new PhpEcho("intranet/home.php")]);

        echo ($tpl);
    });

    $router->get('/bookings', function () {
        if (Session::getInstance()->Get("user") === null) {
            header("Location: /intranet/login");
            return;
        }

        $tpl = new PhpEcho("intranet/layout.php", ["body" => new PhpEcho("intranet/bookings.php")]);

        echo ($tpl);
    });

    $router->get("/bookings/new", function () {
        if (Session::getInstance()->Get("user") === null) {
            header("Location: /intranet/login");
            return;
        }

        $tpl = new PhpEcho("intranet/layout.php", ["body" => new PhpEcho("intranet/new-booking.php")]);

        echo ($tpl);
    });

    $router->get("/login", function() {
        if (Session::getInstance()->Get("user") !== null) {
            header("Location: /intranet");
            return;
        }

        $tpl = new PhpEcho("intranet/login.php");

        echo($tpl);
    });

    $router->post("/login", function() {
        $req = Session::getInstance()->Authenticate($_POST['email'], $_POST['password']);
        if (is_string($req)) {
            header("Location: /intranet/login?error=".$req);
        } elseif (is_bool($req) && $req) {
            new User(); // TODO INCOMPLETO!
            header("Location: /intranet");
        }
    });

    $router->get("/sign-up", function () {
        $tpl = new PhpEcho("intranet/sign-up.php");
echo ($tpl);
    });

    $router->get("/logout", function() {
        Session::getInstance()->Destroy();
        header("Location: /intranet/login");
    });
});


//Authentication Middleware
$router->before("GET|POST", "/dasboard/.*", function () {

});

$router->run();