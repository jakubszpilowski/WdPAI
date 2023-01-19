<?php

class User {
    private $id;
    private $email;
    private $password;
    private $username;
    private $role;

    public function __construct(string $username, string $password, string $email, string $role, int $id=null) {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->id = $id;
        $this->role = $role;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function setRole(string $role) {
        $this->role = $role;
    }
}