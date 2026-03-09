<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// Initiate form object and validate the form data.
$form = new LoginForm();

// ✅ Step 1: Validate form data FIRST
if (! $form->validate($email, $password)) {

    return view('session/create.view.php', [
        'errors' => $form->errors(),
        'heading' => 'User Login',
        'email' => $email,
    ]);
}

// ✅ Step 2: Attempt authentication ONLY if validation passes
if (! $auth = new Authenticator()->attempt($email, $password)) {

    // If authentication fails, return the login view with an error message.
    return view('session/create.view.php', [
        'errors' => [
            'creds' => 'Invalid credentials.'
        ],
        'email' => $email,
        'heading' => 'User Login'
    ]);
}

// Redirect to the home page if authentication is successful.
redirect('/');
