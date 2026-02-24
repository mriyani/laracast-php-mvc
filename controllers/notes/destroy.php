<?php

use Core\Database;

$config = require basePath('config.php');

// Create database instance 
$db = new Database($config['database']);

$currentUserId = 1; // Simulating a logged-in user with ID 1

$postId = $_POST['id'] ?? null;

$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $postId])->findOrFail();

authorize($note['user_id'] === $currentUserId);

// Form was submitted, delete the current note
$db->query('DELETE FROM notes WHERE id = :id', ['id' => $postId]);

header('Location: /notes');
exit();
