<?php

use Core\App;
use Core\Database;

// Connect to Database
$db = App::resolve(Database::class);

$currentUserId = 1; // Simulating a logged-in user with ID 1

$postId = $_POST['id'] ?? null;

$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $postId])->findOrFail();

authorize($note['user_id'] === $currentUserId);

// Form was submitted, delete the current note
$db->query('DELETE FROM notes WHERE id = :id', ['id' => $postId]);

header('Location: /notes');
exit();
