<?php

namespace Core\Middleware;

class Guest
{
    public function handle()
    {
        if ($_SESSION['user'] ?? false) {
            redirect('/'); // Redirect authenticated users to the home page.    
        }
    }
}
