<?php

use Core\App;
use Core\Database;
use Core\Validator;

// Connect to Database
$db = App::resolve(Database::class);

$errors = [];

// Single call handles required + min/max length
if ($error = Validator::string($_POST['body'] ?? '', 10, 255, 'Note body')) {
    $errors['body'] = $error;
}

if (! empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}
if (empty($errors)) {
    $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => trim($_POST['body']),
        'user_id' => 1
    ]);
    header('Location: /notes');
    exit;
}
