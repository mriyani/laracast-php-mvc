<?php

// Main routes
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Notes routes
$router->get('/notes', 'controllers/notes/index.php'); // List all notes
$router->get('/note', 'controllers/notes/show.php'); // Show a single note
$router->delete('/note', 'controllers/notes/destroy.php'); // Delete a note

$router->get('/note/create', 'controllers/notes/create.php'); // New form
$router->post('/note', 'controllers/notes/store.php'); // Create a new note
