<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use GuzzleHttp\Promise\Create;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin99',
            'email' => 'admin99@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => Str::random(10),
            'is_admin' => true
        ]);

        User::factory(120)->create();
        Todo::factory(510)->create();
    }
}
