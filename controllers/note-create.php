<?php
$config = require 'config.php';

// Create database instance 
$db = new Database($config['database']);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    // Form empty validation
    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'Note body is required.';
    }

    // Form max-characters validation
    if (strlen($_POST['body']) > 255) {
        $errors['body'] = 'Note body cannot be more than 255 characters.';
    }

    if (empty($errors)) {

        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);

        header('Location: /notes');
    }
}

require 'views/note-create.view.php';
