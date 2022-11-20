<?php
require 'Model.php';
class NoteModel
{
    private static $ID_INCREMENT = 0;
    private $noteID;
    private $title;
    private $content;

    public function __construct(string $title = '', string $content = '')
    {
        $this->noteID = self::$ID_INCREMENT;
        $this->title = $title;
        $this->content = $content;
        self::$ID_INCREMENT++;
    }

    public function GetID()
    {
        return $this->noteID;
    }
    public function GetTitle(): string
    {
        return $this->title;
    }
    public function GetContent(): string
    {
        return $this->content;
    }

    public function SetTitle(string $title): void
    {
        $this->title = $title;
    }
    public function SetContent(string $content): void
    {
        $this->content = $content;
    }

    public static function GetNotes(): array
    {
        $stmt = Model::ExecuteQuery('SELECT note_ID, title, content FROM notes');
        $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, NoteModel::class);
        return $result;
    }
    public function AddNote()
    {
        $flag = Model::ExecuteQuery(
            'INSERT INTO notes (ID, note_ID, title, content) values (DEFAULT, ?, ?, ?)',
            [
                $this->noteID,
                $this->title,
                $this->content
            ]
        );
        return $flag;
    }
    public static function EditNote($NoteID, $title, $content)
    {
        $flag = Model::ExecuteQuery(
            'UPDATE notes SET title=? AND content=? WHERE note_ID=?',
            [
                $title,
                $content,
                $NoteID
            ]
        );
        return $flag;
    }
    public static function DeleteNote($NoteID)
    {
        $flag = Model::ExecuteQuery(
            'DELETE FROM notes WHERE note_ID=?',
            [$NoteID]
        );
        return $flag;
    }
}
