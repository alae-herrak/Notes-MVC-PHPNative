<?php
require './Controller/NoteController.php';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'Create':
            NoteController::Create();
            break;
        case 'AddNote':
            if (isset($_POST['AddNote']) && !empty($_POST['NoteTitle']) && !empty($_POST['NoteContent']))
                NoteController::AddNote($_POST['NoteTitle'], $_POST['NoteContent']);
            break;
        case 'Delete':
            if (isset($_GET['NoteID']))
                NoteController::DeleteNote($_GET['NoteID']);
    }
} else {
    NoteController::GetNotes();
}
