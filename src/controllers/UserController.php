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

    public function change_username(){
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
        $userRepository = new UserRepository();
        $id_user = $_SESSION['id_user'];

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $changed = $userRepository->changeUsername($decoded['username'], $id_user);
            if ($changed) {
                http_response_code(409);
            } else {
                http_response_code(200);
            }

            echo json_encode($userRepository->getUserById($id_user)->getUsername());
        }
    }

    public function change_email() {
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
        $userRepository = new UserRepository();
        $id_user = $_SESSION['id_user'];

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $changed = $userRepository->changeEmail($decoded['email'], $id_user);
            if ($changed) {
                http_response_code(409);
            } else {
                http_response_code(200);
            }

            echo json_encode($userRepository->getUserById($id_user)->getEmail());
        }
    }

    public function change_password() {
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
        $userRepository = new UserRepository();
        $id_user = $_SESSION['id_user'];

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userRepository->changePassword(password_hash($decoded['password'], PASSWORD_BCRYPT), $id_user);
            http_response_code(200);
        }
    }
}