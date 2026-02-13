<?php

require 'functions.php';
// require 'router.php';
require 'Database.php';

$config = require 'config.php';

// Create database instance 
$db = new Database($config['database']);

// Fetch all posts from database
$posts = $db->query('SELECT * FROM posts')->fetchAll();

dd($posts);

// Display the posts
foreach ($posts as $post) {
    echo '<h2>' . htmlspecialchars($post['title']) . '</h2>';
    echo '<hr>';
}
