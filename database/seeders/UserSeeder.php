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
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan pengguna dengan level Apoteker
        User::create([
            'name' => 'apoteker',
            'email' => 'apoteker@gmail.com',
            'password' => Hash::make('password'), // Jangan lupa untuk meng-hash password
            'level' => 'Apoteker',
            'aktif' => true,
        ]);

        // Menambahkan pengguna dengan level Gudang
        User::create([
            'name' => 'gudang',
            'email' => 'gudang@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'Gudang',
            'aktif' => true,
        ]);

        // Menambahkan pengguna dengan level Kasir
        User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'Kasir',
            'aktif' => true,
        ]);

        // Menambahkan pengguna dengan level Pemilik
        User::create([
            'name' => 'pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'Pemilik',
            'aktif' => true,
        ]);
    }
}
