<?php

use Core\App;
use Core\Database;
use Core\Validator;

// Connect to Database
$db = App::resolve(Database::class);

$currentUserId = 1; // Simulating a logged-in user with ID 1

// find the corresponding note
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_POST['id']])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// validate the form
$errors = [];

if ($error = Validator::string($_POST['body'] ?? '', 10, 255, 'Note body')) {
    $errors['body'] = $errors;
}

// if no validation errors, update the record in the notes DB table
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'note' => $note
    ]);
};

$db->query(
    'UPDATE notes SET body = :body WHERE id = :id',
    [
        'id' => $_POST['id'],
        'body' => $_POST['body']
    ]
);

// redirect the user
header('Location: /notes');
die;
