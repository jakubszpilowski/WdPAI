<?php

require_once __DIR__.'/../models/Note.php';
require_once 'Repository.php';

class NoteRepository extends Repository
{
    public function getNote(int $id): ?Note {
        return null;
    }

    public function getLastNotes(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT  nt.id as id,
                    nt.title as title,
                    nt.date as date,
                    nt.details as details,
                    nt.id_user as id_user
            FROM database.public.notes nt
            WHERE id_user = :id_user
            ORDER BY created_at
            LIMIT 3
        ');

        $stmt->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notes as $note) {
            $result[] = new Note(
                $note['title'],
                $note['date'],
                $note['details'],
                $note['id_user'],
                $note['id']
            );
        }

        return $result;
    }
}