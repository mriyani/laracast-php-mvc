<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {
        $errors = [];

        if (Validator::email($email, 'email')) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid credential.';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
