<?php

session_start();

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByUsername(string $username): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT u.username as username,
                   u.password as password,
                   u.email as email,
                   r.role as role,
                   u.id_user as id_user
            FROM database.public.users as u 
            INNER JOIN database.public.roles r 
            ON u.id_role=r.id_role
            WHERE username= :username
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
            $user['email'],
            $user['role'],
            $user['id_user']
        );
    }

    public function emailTaken(string $email): bool {
        $stmt = $this->database->connect()->prepare('
                SELECT * 
                FROM database.public.users as u
                WHERE u.email = :email
        ');

        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailTaken = $stmt->fetch(PDO::FETCH_ASSOC);

        if($emailTaken) {
            return true;
        }
        return false;
    }

    public function usernameTaken(string $username): bool {
        $stmt = $this->database->connect()->prepare('
                    SELECT * 
                    FROM database.public.users as u
                    WHERE u.username = :username
            ');

        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $usernameTaken = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usernameTaken) {
            return true;
        }
        return false;
    }

    public function registerUser(User $user): void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO database.public.users(username, password, email, id_role)
            VALUES(?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getEmail(),
            $user->getRole()
        ]);
    }
}