<?php
require './Model/NoteModel.php';

class NoteController
{
    public static function GetNotes(): void
    {
        $Notes = NoteModel::GetNotes();
        require './View/NotesList.php';
    }
    public static function Create(): void
    {
        require './View/AddNote.php';
    }
    public static function AddNote($title, $content)
    {
        $Note = new NoteModel($title, $content);
        if ($Note->AddNote()) header('Location: ./index.php');
    }
    public static function DeleteNote($NoteID)
    {
        NoteModel::DeleteNote($NoteID);
    }
}
