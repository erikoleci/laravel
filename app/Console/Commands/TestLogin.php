<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestLogin extends Command
{
    protected $signature = 'test:login';
    protected $description = 'Test login with fake users';

    public function handle()
    {
        // Fake users
        $users = [
            [
                'email' => 'admin@test.com',
                'password' => 'password123',
                'role' => 'admin',
            ],
            [
                'email' => 'user@test.com',
                'password' => 'userpass',
                'role' => 'user',
            ],
        ];

        $email = $this->ask('Email:');
        $password = $this->secret('Password:');

        foreach ($users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                $this->info("Login successful! Role: " . $user['role']);
                return 0;
            }
        }

        $this->error("Invalid credentials!");
        return 1;
    }
}
