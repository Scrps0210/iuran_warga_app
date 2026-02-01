<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Iuran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Card Stats
        $wargaCount = Warga::count(); // Total Warga
        $totalWargaAktif = Warga::where('status', 'aktif')->count();
        $totalIuran = Iuran::where('status', 'lunas')->sum('jumlah'); // Revenue
        $totalIuranBelumLunas = Iuran::where('status', 'belum_lunas')->sum('jumlah');

        // Chart 1: Monthly Revenue (Current Year)
        $iuranPerMonth = Iuran::where('status', 'lunas')
            ->whereYear('tanggal_bayar', date('Y'))
            ->selectRaw('MONTH(tanggal_bayar) as month, SUM(jumlah) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Fill missing months with 0
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $iuranPerMonth[$i] ?? 0;
        }

        return view('dashboard', compact(
            'wargaCount',
            'totalWargaAktif',
            'totalIuran',
            'totalIuranBelumLunas',
            'monthlyData'
        ));
    }
}
