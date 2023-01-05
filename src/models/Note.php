<?php

class Note {
    private $title;
    private $content;

    public function __construct(string $title, string $content){
        $this->title = $title;
        if($this->content === null){
            $this->content = "";
        } else{
            $this->content = $content;
        }
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }
}