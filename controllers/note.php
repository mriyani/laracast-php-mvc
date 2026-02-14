<?php

$config = require 'config.php';

// Create database instance 
$db = new Database($config['database']);

$heading = 'Note';

$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->fetch();

require __DIR__ . '/../views/note.view.php';
