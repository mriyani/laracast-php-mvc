<?php

use Core\App;
use Core\Database;
use Core\Validator;

// login the user is the credentials match.
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

// validate the form input.
$errors = [];
if (Validator::email($email, 'email')) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (Validator::string($password)) {
    $errors['password'] = 'Please provide a valid credential.';
}

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors,
        'heading' => 'User Login',
        'email' => $email,
    ]);
}

// find the user by email.
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    // verify the password.
    if (password_verify($password, $user['password'])) {
        // log the user in.
        login([
            'email' => $email
        ]);

        header('Location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'creds' => 'Invalid credentials.'
    ],
    'email' => $email,
    'heading' => 'User Login'
]);
