<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';

class UserController extends AppController
{
    public function settings(){
        $userRepository = new UserRepository();
        $id_user = $_SESSION['id_user'];
        $user = $userRepository->getUserById($id_user);

        $this->render('settings', ['user' => $user]);
    }
}