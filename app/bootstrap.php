<?php

session_start();

require_once '../vendor/autoload.php';

require_once 'configuration.php';
$cfg = Config::getInstance();

require_once 'models/User.php';
require_once 'models/UserType.php';
require_once 'models/UserGender.php';

require_once 'session.php';
$session = Session::getInstance();//This will initialize the first Singleton.

require_once 'views.php';

require_once 'router.php';