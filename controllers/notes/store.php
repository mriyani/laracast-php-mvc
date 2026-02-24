<?php

use Core\Database;
use Core\Validator;

$config = require basePath('config.php');

// Create database instance 
$db = new Database($config['database']);

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
