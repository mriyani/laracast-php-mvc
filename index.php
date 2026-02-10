<?php

require 'functions.php';
// require 'router.php';

// Connect to the MySQL database
try {
    // Declare the Data Source Name (DSN)
    $dsn = 'mysql:host=localhost;dbname=myapp;charset=utf8mb4';
    // Create a new PDO instance connecting to the database
    $pdo = new PDO($dsn, 'root', '');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Fetch posts data from the database
try {
    // Prepare and execute a SQL query to fetch all posts
    $stmt = $pdo->prepare('SELECT * FROM posts');
    $stmt->execute();
    // Fetch all results as an associative array
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}

// Display the posts
foreach ($posts as $post) {
    echo '<h2>' . htmlspecialchars($post['title']) . '</h2>';
    echo '<hr>';
}
