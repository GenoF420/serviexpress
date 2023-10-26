<?php

require_once '../vendor/autoload.php';

require_once 'configuration.php';
$cfg = Config::getInstance();

require_once 'session.php';
$session = Session::getInstance();//This will initialize the first Singleton.

require_once 'views.php';

require_once 'router.php';