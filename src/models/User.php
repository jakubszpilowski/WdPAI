<?php

class User {
    private $id;
    private $email;
    private $password;
    private $username;

    public function __construct(string $email, string $password, string $username, int $id=null) {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->id = $id;
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
}