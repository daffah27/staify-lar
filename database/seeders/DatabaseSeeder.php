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
            'username' => 'admin',
            'password' => bcrypt('123'),
            'role' => 'mahasiswa',
        ]);

        User::factory()->create([
            'name' => 'Himadira',
            'nim' => '01',
            'jurusan' => 'RPLA',
            'angkatan' => '2023',
            'username' => 'ormawa',
            'password' => bcrypt('123'),
            'role' => 'ormawa',
        ]);

        User::factory()->create([
            'name' => 'Kemahasiswaan',
            'nim' => '02',
            'jurusan' => 'RPLA',
            'angkatan' => '2023',
            'username' => 'kemahasiswaan',
            'password' => bcrypt('123'),
            'role' => 'kemahasiswaan',
        ]);
    }
}
