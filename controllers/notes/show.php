<?php

use Core\Database;

$config = require basePath('config.php');

// Create database instance 
$db = new Database($config['database']);

$currentUserId = 1; // Simulating a logged-in user with ID 1

// Show the note
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);
