@extends('layouts.app')

@section('title', 'Dashboard - Sistem Iuran Warga')

@section('content')
    <!-- Stats Cards Row -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4 2xl:gap-6">
        <!-- Card 1 - Total Warga -->
        <div class="rounded-lg bg-dark-card border border-dark-border p-6">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary-500/10">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm font-medium text-dark-text-secondary">Total Warga</span>
                <div class="flex items-end justify-between mt-1">
                    <h4 class="text-2xl font-bold text-white">{{ number_format($totalWarga) }}</h4>
                    <span class="flex items-center gap-1 text-sm font-medium text-success">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ $totalWargaAktif }} aktif
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 2 - Warga Aktif -->
        <div class="rounded-lg bg-dark-card border border-dark-border p-6">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-success/10">
                    <svg class="w-6 h-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm font-medium text-dark-text-secondary">Warga Aktif</span>
                <div class="flex items-end justify-between mt-1">
                    <h4 class="text-2xl font-bold text-white">{{ number_format($totalWargaAktif) }}</h4>
                    <span class="flex items-center gap-1 text-sm font-medium text-success">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        100%
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 3 - Iuran Lunas -->
        <div class="rounded-lg bg-dark-card border border-dark-border p-6">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-info/10">
                    <svg class="w-6 h-6 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm font-medium text-dark-text-secondary">Iuran Lunas</span>
                <div class="flex items-end justify-between mt-1">
                    <h4 class="text-xl font-bold text-white">Rp {{ number_format($totalIuranLunas, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>

        <!-- Card 4 - Iuran Belum Lunas -->
        <div class="rounded-lg bg-dark-card border border-dark-border p-6">
            <div class="flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-danger/10">
                    <svg class="w-6 h-6 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm font-medium text-dark-text-secondary">Iuran Belum Lunas</span>
                <div class="flex items-end justify-between mt-1">
                    <h4 class="text-xl font-bold text-white">Rp {{ number_format($totalIuranBelumLunas, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="mt-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-6">
        <!-- Monthly Sales Chart -->
        <div class="col-span-12 xl:col-span-8">
            <div class="rounded-lg bg-dark-card border border-dark-border p-6">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-white">Statistik Iuran Bulanan</h4>
                        <p class="text-sm text-dark-text-secondary">Grafik pembayaran iuran per bulan</p>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Monthly Target / Pie Chart -->
        <div class="col-span-12 xl:col-span-4">
            <div class="rounded-lg bg-dark-card border border-dark-border p-6">
                <div class="mb-4">
                    <h4 class="text-lg font-semibold text-white">Target Bulanan</h4>
                    <p class="text-sm text-dark-text-secondary">Target tercapai bulan ini</p>
                </div>
                <div class="flex items-center justify-center">
                    <div class="relative">
                        <canvas id="targetChart" width="200" height="200"></canvas>
                        <div class="absolute inset-0 flex items-center justify-center flex-col">
                            <span
                                class="text-3xl font-bold text-white">{{ $totalIuranLunas > 0 ? round(($totalIuranLunas / ($totalIuranLunas + $totalIuranBelumLunas)) * 100, 1) : 0 }}%</span>
                            <span class="text-sm text-dark-text-secondary">Tercapai</span>
                        </div>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-3 gap-4 text-center">
                    <div class="rounded-lg bg-dark-bg p-3">
                        <span class="text-lg font-bold text-primary-500">Rp
                            {{ number_format($totalIuranLunas / 1000, 0) }}K</span>
                        <p class="text-xs text-dark-text-secondary mt-1">Target</p>
                    </div>
                    <div class="rounded-lg bg-dark-bg p-3">
                        <span class="text-lg font-bold text-success">Rp
                            {{ number_format($totalIuranLunas / 1000, 0) }}K</span>
                        <p class="text-xs text-dark-text-secondary mt-1">Revenue</p>
                    </div>
                    <div class="rounded-lg bg-dark-bg p-3">
                        <span class="text-lg font-bold text-info">Rp
                            {{ number_format(($totalIuranLunas + $totalIuranBelumLunas) / 1000, 0) }}K</span>
                        <p class="text-xs text-dark-text-secondary mt-1">Today</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Chart -->
    <div class="mt-6">
        <div class="rounded-lg bg-dark-card border border-dark-border p-6">
            <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h4 class="text-lg font-semibold text-white">Statistics</h4>
                    <p class="text-sm text-dark-text-secondary">Target pencapaian bulanan</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <span class="h-3 w-3 rounded-full bg-primary-500"></span>
                        <span class="text-sm text-dark-text-secondary">Lunas</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="h-3 w-3 rounded-full bg-success"></span>
                        <span class="text-sm text-dark-text-secondary">Belum Lunas</span>
                    </div>
                </div>
            </div>
            <div class="h-64">
                <canvas id="statisticsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="mt-6 grid grid-cols-12 gap-4 md:gap-6">
        <!-- Customer Demographics -->
        <div class="col-span-12 xl:col-span-5">
            <div class="rounded-lg bg-dark-card border border-dark-border p-6">
                <div class="mb-4">
                    <h4 class="text-lg font-semibold text-white">Data Warga</h4>
                    <p class="text-sm text-dark-text-secondary">Distribusi warga per wilayah</p>
                </div>
                <div class="space-y-4">
                    @php
                        $daerahList = [
                            ['nama' => 'Panyingkiran', 'jumlah' => 1],
                            ['nama' => 'Kadipaten', 'jumlah' => 1],
                            ['nama' => 'Tomo', 'jumlah' => 1],
                            ['nama' => 'Maja', 'jumlah' => 1],
                            ['nama' => 'Jatiwangi', 'jumlah' => 1],
                        ];
                    @endphp
                    @foreach($daerahList as $daerah)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-500/10 text-primary-500 text-xs font-medium">
                                    {{ strtoupper(substr($daerah['nama'], 0, 2)) }}
                                </span>
                                <span class="text-sm text-white">{{ $daerah['nama'] }}</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="hidden sm:block w-32 h-2 rounded-full bg-dark-bg overflow-hidden">
                                    <div class="h-full bg-primary-500"
                                        style="width: {{ ($daerah['jumlah'] / $totalWarga) * 100 }}%"></div>
                                </div>
                                <span
                                    class="text-sm text-dark-text-secondary">{{ round(($daerah['jumlah'] / $totalWarga) * 100) }}%</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="col-span-12 xl:col-span-7">
            <div class="rounded-lg bg-dark-card border border-dark-border">
                <div class="p-6 flex items-center justify-between">
                    <h4 class="text-lg font-semibold text-white">Pembayaran Terbaru</h4>
                    <div class="flex items-center gap-2">
                        <button
                            class="inline-flex items-center gap-2 rounded-md border border-dark-border py-1.5 px-3 text-sm text-dark-text-secondary hover:bg-dark-bg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('iuran.index') }}" class="text-sm text-primary-500 hover:underline">See all</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-t border-dark-border bg-dark-bg/50">
                                <th class="py-3 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase">Warga
                                </th>
                                <th class="py-3 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase">
                                    Periode</th>
                                <th class="py-3 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase">
                                    Jumlah</th>
                                <th class="py-3 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-dark-border">
                            @forelse($iuranTerbaru as $iuran)
                                <tr class="hover:bg-dark-bg/30 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($iuran->warga->nama ?? '-') }}&background=3b82f6&color=fff"
                                                alt="" class="h-10 w-10 rounded-full">
                                            <div>
                                                <p class="text-sm font-medium text-white">{{ $iuran->warga->nama ?? '-' }}</p>
                                                <p class="text-xs text-dark-text-secondary">{{ $iuran->warga->alamat ?? '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-sm text-dark-text">{{ $iuran->nama_bulan }} {{ $iuran->tahun }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-white font-medium">Rp
                                        {{ number_format($iuran->jumlah, 0, ',', '.') }}</td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $iuran->status === 'lunas' ? 'bg-success/10 text-success' : 'bg-danger/10 text-danger' }}">
                                            {{ ucfirst(str_replace('_', ' ', $iuran->status)) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 px-6 text-center text-dark-text-secondary">
                                        Belum ada data pembayaran
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Monthly Bar Chart
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Iuran Terkumpul',
                    data: [350, 280, 420, 380, 500, 450, 520, 480, 400, 550, 600, 520],
                    backgroundColor: '#3b82f6',
                    borderRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: '#8899a8' }
                    },
                    y: {
                        grid: { color: '#2e3a47' },
                        ticks: { color: '#8899a8' }
                    }
                }
            }
        });

        // Target Doughnut Chart
        const targetCtx = document.getElementById('targetChart').getContext('2d');
        new Chart(targetCtx, {
            type: 'doughnut',
            data: {
                labels: ['Lunas', 'Belum Lunas'],
                datasets: [{
                    data: [{{ $totalIuranLunas }}, {{ $totalIuranBelumLunas }}],
                    backgroundColor: ['#3b82f6', '#1e293b'],
                    borderWidth: 0,
                    cutout: '80%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        // Statistics Line Chart
        const statsCtx = document.getElementById('statisticsChart').getContext('2d');
        new Chart(statsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Lunas',
                    data: [30, 45, 35, 50, 40, 60, 55, 70, 65, 80, 75, 90],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Belum Lunas',
                    data: [70, 55, 65, 50, 60, 40, 45, 30, 35, 20, 25, 10],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: '#8899a8' }
                    },
                    y: {
                        grid: { color: '#2e3a47' },
                        ticks: { color: '#8899a8' }
                    }
                }
            }
        });
    </script>
@endpush