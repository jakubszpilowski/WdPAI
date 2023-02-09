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

    public function getAllUsers(): ?array {
        $stmt = $this->database->connect()->prepare('
            SELECT u.username, 
                   u.password, 
                   u.email, 
                   r.role 
            FROM database.public.users u 
            INNER JOIN database.public.roles r 
                ON r.id_role = u.id_role;
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!$users) {
            return null;
        }

        $users_list = [];
        foreach ($users as $user) {
            $users_list[] = new User(
                $user['username'],
                $user['password'],
                $user['email'],
                $user['role'],
                $user['id_user']
            );
        }

        return $users_list;
    }

    public function isAdmin($id_user): bool {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM database.public.admins WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$result){
            return false;
        }

        return true;
    }

    public function getUserById(int $id_user): User {
        $stmt = $this->database->connect()->prepare('
            SELECT u.username as username, 
                   u.password as password, 
                   u.email as email, 
                   r.role as role,
                   u.id_user as id_user
            FROM database.public.users u 
            INNER JOIN database.public.roles r 
                ON r.id_role = u.id_role
            WHERE id_user = :id_user;
        ');

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return new User(
            $user['username'],
            $user['password'],
            $user['email'],
            $user['role'],
            $user['id_user']
        );
    }

    public function changeUsername(string $username, int $id_user): bool {
        if($this->usernameTaken($username)){
            return true;
        }

        $stmt = $this->database->connect()->prepare('
            UPDATE database.public.users 
            SET username = :username
            WHERE id_user = :id_user;
        ');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':id_user',$id_user, PDO::PARAM_INT);
        $stmt->execute();

        return false;
    }

    public function changeEmail(string $email, int $id_user): bool {
        if($this->emailTaken($email)){
            return true;
        }

        $stmt = $this->database->connect()->prepare('
            UPDATE database.public.users 
            SET email = :email
            WHERE id_user = :id_user;
        ');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id_user',$id_user, PDO::PARAM_INT);
        $stmt->execute();

        return false;
    }

    public function changePassword(string $password, int $id_user): void {
        $stmt = $this->database->connect()->prepare('
            UPDATE ON database.public.users
            SET password = :password
            WHERE id_user = :id_user;
        ');
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
    }
}