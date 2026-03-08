<?php

use Core\App;
use Core\Database;

// Connect to Database
$db = App::resolve(Database::class);

$currentUserId = 1; // Simulating a logged-in user with ID 1

// Show the note
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

// Show the form to create a new note
view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
