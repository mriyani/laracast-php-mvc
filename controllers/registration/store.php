<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form input.
$errors = [];
if ($error = Validator::email($email, 'email')) {
    $errors['email'] = $error;
}

if ($error = Validator::string($password, 3, 4, 'password')) {
    $errors['password'] = $error;
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
        'heading' => 'User Registration',
        'email' => $email ?? ''
    ]);
}

$db = App::resolve(Database::class);

// check if account exist
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

// if yes, redirec to login page
if ($user) {
    header('Location: /login');
    exit();
} else {
    // if no, save the new registration and log in the user and redirect
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    // mark that user has logged in 
    $_SESSION['user'] = [
        'email' => $email
    ];

    // redirect
    header('Location: /notes');
    exit();
}
