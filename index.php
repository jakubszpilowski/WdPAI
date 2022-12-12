<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('sign', 'DefaultController');
Routing::get('home', 'DefaultController');
Routing::get('week', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::get('admin', 'DefaultController');
Routing::get('all', 'DefaultController');

Routing::run($path);