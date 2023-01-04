<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login(){
        $user = new User('jnowak@wp.pl', 'admin', 'jnowak');

        if(!$this->isPost()){
            return $this->render('login');
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        if($user->getUsername() !== $username){
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if($user->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Invalid password!']]);
        }

        //return $this->render('main_page');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }
}