<?php

require_once __DIR__.'/../models/Note.php';
require_once 'Repository.php';

class NoteRepository extends Repository
{
    public function getAllNotes(): ?array {
        $stmt = $this->database->connect()->prepare('
            SELECT  nt.id as id,
                    nt.title as title,
                    nt.note_date as dat,
                    nt.details as details,
                    nt.id_user as id_user
            FROM database.public.notes nt
            WHERE id_user = :id_user
            ORDER BY created_at desc 
        ');

        $stmt->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!$notes) {
            return null;
        }

        $result = [];
        foreach ($notes as $note) {
            $result[] = new Note(
                $note['title'],
                $note['details'],
                $note['dat'],
                $note['id_user'],
                $note['id']
            );
        }

        return $result;
    }

    public function getLastNotes(): ?array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT  nt.id as id,
                    nt.title as title,
                    nt.note_date as dat,
                    nt.details as details,
                    nt.id_user as id_user
            FROM database.public.notes nt
            WHERE id_user = :id_user
            ORDER BY created_at desc 
            LIMIT 3
        ');

        $stmt->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!$notes) {
            return null;
        }

        foreach ($notes as $note) {
            $result[] = new Note(
                $note['title'],
                $note['details'],
                $note['dat'],
                $note['id_user'],
                $note['id']
            );
        }

        return $result;
    }

    public function addNote(Note $note) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO database.public.notes (title, details, id_user, note_date)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
           $note->getTitle(),
           $note->getDetails(),
           $note->getIdUser(),
           $note->getDate()
        ]);
    }

    public function deleteNote(int $id) {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM database.public.notes
            WHERE id = :id 
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getUpdate() {
        $stmt = $this->database->connect()->prepare('
            SELECT  nt.id as id,
                    nt.title as title,
                    nt.note_date as dat,
                    nt.details as details,
                    nt.id_user as id_user
            FROM database.public.notes nt
            WHERE id_user = :id_user
            ORDER BY created_at desc 
            LIMIT 3
        ');

        $stmt->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}