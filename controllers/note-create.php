<?php

require 'Validator.php';

$config = require 'config.php';

// Create database instance 
$db = new Database($config['database']);

$heading = 'Create Note';

// dd(Validator::email('email@.com', 'Note body')); // Example of email validation (will fail)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    // Single call handles required + min/max length
    if ($error = Validator::string($_POST['body'] ?? '', 10, 255, 'Note body')) {
        $errors['body'] = $error;
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => trim($_POST['body']),
            'user_id' => 1
        ]);
        header('Location: /notes');
        exit;
    }
}

require 'views/note-create.view.php';
