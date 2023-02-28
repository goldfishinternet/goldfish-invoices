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
                'name'              => 'Admin',
                'email'             => 'admin@admin.com',
                'password'          => bcrypt('password'),
                'remember_token'    => null,
                'email_verified_at' => now(),
                'is_approved'       => true,
                'locale'            => '',
            ],
        ];

        User::insert($users);
    }
}
