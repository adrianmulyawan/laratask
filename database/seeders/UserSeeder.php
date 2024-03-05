<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Adrian Mulyawan',
                'username' => 'adrianmulyawan',
                'email' => 'adrianmulyawan@mail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Mulyawan Muhammad',
                'username' => 'mulyawanmuhammad',
                'email' => 'mulyawanmuhammad@mail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Anita Putri',
                'username' => 'anitaputri',
                'email' => 'anitaputri@mail.com',
                'password' => bcrypt('password')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
