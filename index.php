<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('start', 'DefaultController');
Routing::get('sign', 'DefaultController');
Routing::get('home', 'NoteController');
Routing::get('week', 'DefaultController');
Routing::get('settings', 'UserController');
Routing::get('all', 'NoteController');

Routing::post('add_note_in_all', 'NoteController');
Routing::post('add_note','NoteController');
Routing::post('delete_note', 'NoteController');
Routing::post('delete_notes', 'NoteController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::get('admin', 'SecurityController');
Routing::post('delete_user', 'UserController');
Routing::post('change_username', 'UserController');
Routing::post('change_email', 'UserController');
Routing::post('change_password', 'UserController');

Routing::run($path);