<?php

$config = require 'config.php';

// Create database instance 
$db = new Database($config['database']);

$heading = 'My Notes';

$notes = $db->query('SELECT * FROM notes WHERE user_id = 1', [])->fetchAll();

require __DIR__ . '/../views/notes.view.php';
