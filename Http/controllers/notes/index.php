<?php

use Core\App;
use Core\Database;

// Connect to Database
$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE user_id = 1', [])->getAll();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);
