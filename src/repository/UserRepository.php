<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByUsername(string $username): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE username= :username
        ');
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            return null;
        }

        return new User(
            $user['username'],
            $user['password'],
            $user['email']
        );
    }
}