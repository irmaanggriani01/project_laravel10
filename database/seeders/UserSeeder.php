<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    const DEFAULT_PASSWORD = 'password';
    const ROLES = [
        'kaprodi',
        'dosen_biasa',
        'dosen_wali',
        'mahasiswa'
    ];

    public function run()
    {
        // 1 Kaprodi
        User::create([
            'name' => 'Kaprodi',
            'email' => 'kaprodi@gmail.com',
            'password' => Hash::make(self::DEFAULT_PASSWORD),
            'role' => self::ROLES[0],
        ]);

        // 3 Dosen Biasa
        User::createMany([
            [
                'name' => 'Dosen Biasa 1',
                'email' => 'dosenbiasa1@gmail.com',
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'role' => self::ROLES[1],
            ],
            [
                'name' => 'Dosen Biasa 2',
                'email' => 'dosenbiasa2@gmail.com',
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'role' => self::ROLES[1],
            ],
            [
                'name' => 'Dosen Biasa 3',
                'email' => 'dosenbiasa3@gmail.com',
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'role' => self::ROLES[1],
            ],
        ]);

        // 2 Dosen Wali
        User::createMany([
            [
                'name' => 'Dosen Wali 1',
                'email' => 'dosenwali1@gmail.com',
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'role' => self::ROLES[2],
            ],
            [
                'name' => 'Dosen Wali 2',
                'email' => 'dosenwali2@gmail.com',
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'role' => self::ROLES[2],
            ],
        ]);

        // 20 Mahasiswa
        $mahasiswa = [];
        for ($i = 1; $i <= 20; $i++) {
            $mahasiswa[] = [
                'name' => 'Mahasiswa ' . $i,
                'email' => 'mahasiswa' . $i . '@gmail.com',
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'role' => self::ROLES[3],
            ];
        }

        // Insert mahasiswa ke database
        DB::table('users')->insert($mahasiswa);
    }
}
