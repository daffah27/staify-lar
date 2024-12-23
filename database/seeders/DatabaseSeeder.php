<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Daffah Putra',
            'nim' => '607062330131',
            'jurusan' => 'RPLA',
            'angkatan' => '2023',
            'email' => 'mh.daffah27@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('123'),
            'role' => 'mahasiswa',
        ]);

        User::factory()->create([
            'name' => 'Himadira',
            'email' => 'Himadira@example.com',
            'username' => 'ormawa',
            'password' => bcrypt('123'),
            'role' => 'ormawa',
        ]);

        User::factory()->create([
            'name' => 'Kemahasiswaan',
            'email' => 'Kemahasiswaan@example.com',
            'username' => 'kemahasiswaan',
            'password' => bcrypt('123'),
            'role' => 'kemahasiswaan',
        ]);
    }
}
