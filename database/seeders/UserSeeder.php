<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user',
            'username' => 'user',
            'phone' => '12345678',
            'city' => 'Jakarta',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'country' => 'ID',
        ]);
        
        User::create([
            'name' => 'mentor',
            'username' => 'mentor',
            'phone' => '12345678',
            'city' => 'Jakarta',
            'email' => 'mentor@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'mentor',
            'country' => 'ID',
        ]);

        User::create([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'phone' => '12345678',
            'city' => 'Jakarta',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
            'country' => 'ID',
        ]);

    }
}
