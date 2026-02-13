<?php

require 'functions.php';
require 'Database.php';

// Create database instance 
$db = new Database();

// Fetch all posts from database
$posts = $db->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_ASSOC);

// dd($posts);

// Display the posts
foreach ($posts as $post) {
    echo '<h2>' . htmlspecialchars($post['title']) . '</h2>';
    echo '<hr>';
}
