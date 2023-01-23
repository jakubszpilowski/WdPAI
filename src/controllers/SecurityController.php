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

        if(!password_verify($password, $user->getPassword())){
            return $this->render('login', ['messages' => ['Invalid password!']]);
        }

        $this->setCookie($username);
        $this->startSession($user);

        $_SESSION['id_user'] = $user->getId();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function register(){
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('sign_up');
        }

        $username = $_POST['username'];
        if($userRepository->usernameTaken($username)) {
            return $this->render('sign_up', ['messages' => ['Username already taken']]);
        }

        $email = $_POST['email'];
        if($userRepository->emailTaken($email)){
            return $this->render('sign_up', ['messages' => ['Email already taken']]);
        }

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user = new User($username, $password, $email, 2);

        $userRepository->registerUser($user);

        $registeredUser = $userRepository->getUserByUsername($username);
        $this->setCookie($registeredUser->getUsername());
        $this->startSession($registeredUser);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function logout(){
        setcookie('user', $_COOKIE['user'], time() - 10, "/");
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/start");
    }

    private function setCookie(string $username): void {
        $cookie = 'user';
        $cookie_value = $username;
        setcookie($cookie, $cookie_value, time() + (60 * 20), "/");
    }

    private function startSession(?User $user): void {
        session_start();
        $_SESSION['id_user'] = $user->getId();
    }
}