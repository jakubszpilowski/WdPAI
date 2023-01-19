<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Note.php';
require_once __DIR__.'/../repository/NoteRepository.php';

class NoteController extends AppController {
    private $noteRepository;

    public function __construct()
    {
        parent::__construct();
        $this->noteRepository = new NoteRepository();
    }

    public function home(){
        $this->render('main_page', ['notes' => $this->noteRepository->getLastNotes()]);
    }

    public function addNote(){

    }

    public function deleteNote(){

    }

    public function editNote(){

    }

}