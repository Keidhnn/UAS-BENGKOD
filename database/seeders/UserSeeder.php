<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Poli; // <--- JANGAN LUPA TAMBAHKAN INI DI ATAS
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
        // 1. BUAT DATA POLI TERLEBIH DAHULU AGAR ID 1 TERSEDIA
        Poli::create([
            'nama_poli' => 'Poli Umum',
            'keterangan' => 'Pemeriksaan Umum'
        ]);

        // 2. BARU BUAT DATA USER
        // nama, email, password, role, id_poli
        $users = [
            [
                'name' => 'Admin', // <--- Ubah dari 'nama' menjadi 'name'
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'), // Passwordnya: admin
                'role' => 'admin',
                'id_poli' => null, 
            ],
            [
                'name' => 'Dokter', // <--- Ubah dari 'nama' menjadi 'name'
                'email' => 'dokter@gmail.com',
                'password' => Hash::make('dokter'), // Passwordnya: dokter
                'role' => 'dokter',
                'id_poli' => 1, 
            ],
            [
                'name' => 'Pasien', // <--- Ubah dari 'nama' menjadi 'name'
                'email' => 'pasien@gmail.com',
                'password' => Hash::make('pasien'), // Passwordnya: pasien
                'role' => 'pasien',
                'id_poli' => null, 
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}