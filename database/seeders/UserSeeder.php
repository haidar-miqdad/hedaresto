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
        User::factory(40)->create();

        User::factory()->create([
            'name' => 'miqdad',
            'email' => 'miqdad@idn.com',
            'password' => Hash::make('12345678'),
            'roles' => 'admin',
            'email_verified_at' => now(),
            'phone' => '08123456789',
        ]);
    }
}
