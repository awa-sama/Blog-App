<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Ambil role dari database
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        // Buat beberapa pengguna dengan peran yang sesuai
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'phone_number' => '1234567890',
            'address' => 'Admin Address',
            'profile_photo' => 'images\bloom__testimonial-01.jpg',
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Hatsune Miku',
            'email' => 'hatsune39@mail.com',
            'password' => Hash::make('password'),
            'phone_number' => '39393939393939',
            'address' => 'she live in my heart',
            'profile_photo' => 'images\bloom__testimonial-02.jpg',
            'role_id' => $userRole->id,
        ]);

        User::create([
            'name' => 'Megurine Luka',
            'email' => 'lukamegurine@mail.com',
            'password' => Hash::make('password'),
            'phone_number' => '1122334455',
            'address' => 'she live in my heart too',
            'profile_photo' => 'images\bloom__testimonial-04.jpg',
            'role_id' => $userRole->id,
        ]);
    }
}
