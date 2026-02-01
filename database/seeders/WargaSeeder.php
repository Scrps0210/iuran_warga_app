<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wargas = [
            [
                'nama' => 'Christian Gabriel',
                'nik' => '3210010101010001',
                'alamat' => 'Panyingkiran, Majalengka',
                'no_hp' => '081234567801',
                'jenis_kelamin' => 'L',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Abdillah Oktavian',
                'nik' => '3210010101010002',
                'alamat' => 'Kadipaten, Majalengka',
                'no_hp' => '081234567802',
                'jenis_kelamin' => 'L',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Ilham Jamaludin',
                'nik' => '3210010101010003',
                'alamat' => 'Tomo, Sumedang',
                'no_hp' => '081234567803',
                'jenis_kelamin' => 'L',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Rifa',
                'nik' => '3210010101010004',
                'alamat' => 'Maja, Majalengka',
                'no_hp' => '081234567804',
                'jenis_kelamin' => 'P',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Arif Cibo',
                'nik' => '3210010101010005',
                'alamat' => 'Jatiwangi, Majalengka',
                'no_hp' => '081234567805',
                'jenis_kelamin' => 'L',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Zaky',
                'nik' => '3210010101010006',
                'alamat' => 'Bantarujeg, Majalengka',
                'no_hp' => '081234567806',
                'jenis_kelamin' => 'L',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Rifki',
                'nik' => '3210010101010007',
                'alamat' => 'Majalengka',
                'no_hp' => '081234567807',
                'jenis_kelamin' => 'L',
                'status' => 'aktif',
            ],
        ];

        foreach ($wargas as $warga) {
            Warga::create($warga);
        }
    }
}
