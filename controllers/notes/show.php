<?php

use Core\Database;

$config = require basePath('config.php');

// Create database instance 
$db = new Database($config['database']);

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    // Form was submitted, delete the note
    $db->query('DELETE FROM notes WHERE id = :id', ['id' => $_POST['id']]);
    header('Location: /notes');
    exit();
} else {
    // Show the note
    $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    view('notes/show.view.php', [
        'heading' => 'Note',
        'note' => $note
    ]);
}
