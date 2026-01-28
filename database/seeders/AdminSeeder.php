<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Ismail',
            'email' => 'ismailbenmezi500@gmail.com',
            'password' => bcrypt('ismailbenmezi500@gmail.com'),
            'role' => 'librarian',
        ]);
    }
}
