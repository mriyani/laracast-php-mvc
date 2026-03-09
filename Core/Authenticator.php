<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        // find the user by email.
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            // verify the password.
            if (password_verify($password, $user['password'])) {
                // log the user in.
                login($user);

                return true;
            }
        }

        return false;
    }
}
