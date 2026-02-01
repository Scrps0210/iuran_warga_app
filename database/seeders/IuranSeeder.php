<?php

namespace Database\Seeders;

use App\Models\Iuran;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class IuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wargas = Warga::all();
        $tahun = 2026;
        $jumlahIuran = 50000; // Rp 50.000 per bulan

        foreach ($wargas as $warga) {
            // Generate iuran untuk bulan Januari - Desember 2026
            for ($bulan = 1; $bulan <= 12; $bulan++) {
                // Random status: 70% lunas, 30% belum lunas untuk bulan yang sudah lewat
                $isLunas = $bulan <= 1 ? (rand(1, 10) <= 7) : false;

                Iuran::create([
                    'warga_id' => $warga->id,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jumlah' => $jumlahIuran,
                    'tanggal_bayar' => $isLunas ? now()->setMonth($bulan)->setDay(rand(1, 28)) : null,
                    'status' => $isLunas ? 'lunas' : 'belum_lunas',
                    'keterangan' => $isLunas ? 'Pembayaran iuran bulanan' : null,
                ]);
            }
        }
    }
}
