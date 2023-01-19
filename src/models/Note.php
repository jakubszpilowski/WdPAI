<?php

use Cassandra\Date;

class Note {
    private $id;
    private $title;
    private $details;
    private $date;
    private $id_user;

    public function __construct(string $title, string $details, Date $date, int $id_user, $id = null){
        $this->title = $title;
        $this->details = $details;
        $this->date = $date;
        $this->id_user = $id_user;
        $this->id = $id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getDetails(): string {
        return $this->details;
    }

    public function setDetails(string $details) {
        $this->details = $details;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getDate(): Date
    {
        return $this->date;
    }

    public function setDate(Date $date): void
    {
        $this->date = $date;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }
}