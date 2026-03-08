<?php

// Main routes
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// Notes routes
$router->get('/notes', 'notes/index.php')->only('auth'); // List all notes
$router->get('/note', 'notes/show.php'); // Show a single note
$router->delete('/note', 'notes/destroy.php'); // Delete a note

$router->get('/note/edit', 'notes/edit.php'); // Edit form
$router->patch('/note', 'notes/update.php'); // Patch a single note

$router->get('/note/create', 'notes/create.php'); // New form
$router->post('/note', 'notes/store.php'); // Create a new note

$router->get('/register', 'registration/create.php')->only('guest'); // Registration from
$router->post('/register', 'registration/store.php')->only('guest'); // Register

$router->get('/login', 'session/create.php')->only('guest'); // Registration from
$router->post('/session', 'session/store.php')->only('guest'); // Registration from
$router->delete('/session', 'session/destroy.php')->only('auth'); // Logout