<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                => 1,
                'name'              => 'Andy Carroll',
                'email'             => 'andy@goldfishinternet.com',
                'password'          => '$2y$10$Jrd61fYOTP6Gzwr72Ge1AuXus/QxeGqobBjNwRWoljMUecfKFkzHW', //bcrypt('password'),
                'remember_token'    => null,
                'email_verified_at' => now(),
                'is_approved'       => true,
                'locale'            => '',
            ],
        ];

        User::insert($users);
    }
}
