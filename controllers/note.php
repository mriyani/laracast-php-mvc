<?php

$config = require 'config.php';

// Create database instance 
$db = new Database($config['database']);

$heading = 'Note';

$currentUserId = 1;


$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->fetch();


if (! $note) {
    abort();
}


if ($note['user_id'] !== $currentUserId) {
    abort(Response::HTTP_FORBIDDEN);
}


require 'views/note.view.php';
