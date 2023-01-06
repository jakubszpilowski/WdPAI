<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login(){
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = $userRepository->getUserByUsername($username);

        if(!$user){
            return $this->render('login', ['messages' => ['User does not exist!']]);
        }

        if($user->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Invalid password!']]);
        }

        //return $this->render('main_page');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }
}