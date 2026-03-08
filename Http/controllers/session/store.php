<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

// login the user is the credentials match.
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// Initiate form object and validate the form data.
$form = new LoginForm();

if (!$form->validate($email, $password)) {

    return view('session/create.view.php', [
        'errors' => $form->errors(),
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
