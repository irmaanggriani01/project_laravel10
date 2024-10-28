<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 1 Kaprodi
        User::create([
            'name' => 'Kaprodi',
            'email' => 'kaprodi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'kaprodi'
        ]);

        // 3 Dosen Biasa
        User::create([
            'name' => 'Dosen Biasa 1',
            'email' => 'dosenbiasa1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'dosen_biasa'
        ]);

        User::create([
            'name' => 'Dosen Biasa 2',
            'email' => 'dosenbiasa2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'dosen_biasa'
        ]);

        User::create([
            'name' => 'Dosen Biasa 3',
            'email' => 'dosenbiasa3@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'dosen_biasa'
        ]);

        // 2 Dosen Wali
        User::create([
            'name' => 'Dosen Wali 1',
            'email' => 'dosenwali1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'dosen_wali'
        ]);

        User::create([
            'name' => 'Dosen Wali 2',
            'email' => 'dosenwali2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'dosen_wali'
        ]);

        // 20 Mahasiswa
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => 'Mahasiswa ' . $i,
                'email' => 'mahasiswa' . $i . '@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa'
            ]);
        }
    }
}
