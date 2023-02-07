<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Note.php';
require_once __DIR__.'/../repository/NoteRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

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

    /**
     * @throws Exception
     */
    public function add_note(){
        if(!$this->isPost()) {
            return $this->render('main_page', ['notes' => $this->noteRepository->getLastNotes()]);
        }

        $date = new DateTime($_POST['date']);
        if($date < new DateTime()) {
            return $this->render(
                'main_page',
                ['notes' => $this->noteRepository->getLastNotes(),
                    'messages' => ['You can\'t make note in past'],
                    'flag' => true]
            );
        }

        $dat = $_POST['date'];
        $title = $_POST['title'];
        $details = $_POST['details'];

        $userRepository = new UserRepository();

        $note = new Note($title, $details, $dat, $_SESSION['id_user']);

        $this->noteRepository->addNote($note);

        $this->render('main_page', ['notes' => $this->noteRepository->getLastNotes(), 'messages' => ['Note added successfully']]);
    }

    public function delete_note(int $id){
        $this->noteRepository->deleteNote($id);
    }

    public function editNote(){

    }

    public function all(){
        $this->render('all_notes', ['notes' => $this->noteRepository->getAllNotes()]);
    }
}