<?php

use Core\Database;

$config = require basePath('config.php');

// Create database instance 
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes WHERE user_id = 1', [])->getAll();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);
