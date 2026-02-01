@extends('layouts.app')

@section('title', 'Data Iuran - Sistem Iuran Warga')

@section('content')
    <!-- Page Header -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-2xl font-bold text-white">Data Iuran</h2>
        <a href="{{ route('iuran.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary-600 py-2.5 px-5 text-sm font-medium text-white hover:bg-primary-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Iuran
        </a>
    </div>

    <!-- Success/Error Alert -->
    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 rounded-lg bg-success/10 border border-success/20 p-4">
            <svg class="w-5 h-5 text-success flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm text-success">{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 flex items-center gap-3 rounded-lg bg-danger/10 border border-danger/20 p-4">
            <svg class="w-5 h-5 text-danger flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm text-danger">{{ session('error') }}</p>
        </div>
    @endif

    <!-- Search & Filter -->
    <div class="mb-6 rounded-lg bg-dark-card border border-dark-border p-4">
        <form action="{{ route('iuran.index') }}" method="GET">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Search -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2">
                        <svg class="w-4 h-4 text-dark-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari warga..."
                        class="w-full bg-dark-bg border border-dark-border rounded-lg py-2.5 pl-10 pr-4 text-sm text-dark-text placeholder-dark-text-secondary focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>

                <!-- Filter Bulan -->
                <select name="bulan"
                    class="w-full bg-dark-bg border border-dark-border rounded-lg py-2.5 px-4 text-sm text-dark-text focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    <option value="">Semua Bulan</option>
                    @php
                        $bulanList = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
                    @endphp
                    @foreach($bulanList as $key => $nama)
                        <option value="{{ $key }}" {{ ($bulan ?? '') == $key ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>

                <!-- Filter Tahun -->
                <select name="tahun"
                    class="w-full bg-dark-bg border border-dark-border rounded-lg py-2.5 px-4 text-sm text-dark-text focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    <option value="">Semua Tahun</option>
                    @for($y = date('Y'); $y >= 2020; $y--)
                        <option value="{{ $y }}" {{ ($tahun ?? '') == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>

                <!-- Filter Status -->
                <select name="status"
                    class="w-full bg-dark-bg border border-dark-border rounded-lg py-2.5 px-4 text-sm text-dark-text focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    <option value="">Semua Status</option>
                    <option value="lunas" {{ ($status ?? '') === 'lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="belum_lunas" {{ ($status ?? '') === 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
                </select>

                <!-- Button -->
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary-600 py-2.5 px-5 text-sm font-medium text-white hover:bg-primary-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="rounded-lg bg-dark-card border border-dark-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-dark-bg/50 border-b border-dark-border">
                        <th
                            class="py-4 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            Warga</th>
                        <th
                            class="py-4 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            Periode</th>
                        <th
                            class="py-4 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            Jumlah</th>
                        <th
                            class="py-4 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            Tgl Bayar</th>
                        <th
                            class="py-4 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            Status</th>
                        <th
                            class="py-4 px-6 text-center text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-dark-border">
                    @forelse($iurans as $iuran)
                        <tr class="hover:bg-dark-bg/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($iuran->warga->nama ?? '-') }}&background=3b82f6&color=fff"
                                        alt="" class="h-10 w-10 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-white">{{ $iuran->warga->nama ?? '-' }}</p>
                                        <p class="text-xs text-dark-text-secondary">{{ $iuran->warga->alamat ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-sm text-dark-text">{{ $iuran->nama_bulan }} {{ $iuran->tahun }}</td>
                            <td class="py-4 px-6 text-sm text-white font-medium">Rp
                                {{ number_format($iuran->jumlah, 0, ',', '.') }}</td>
                            <td class="py-4 px-6 text-sm text-dark-text">
                                {{ $iuran->tanggal_bayar ? $iuran->tanggal_bayar->format('d/m/Y') : '-' }}</td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $iuran->status === 'lunas' ? 'bg-success/10 text-success' : 'bg-danger/10 text-danger' }}">
                                    {{ ucfirst(str_replace('_', ' ', $iuran->status)) }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('iuran.edit', $iuran) }}"
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-warning/10 text-warning hover:bg-warning/20 transition-colors"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('iuran.destroy', $iuran) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data iuran ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-danger/10 text-danger hover:bg-danger/20 transition-colors"
                                            title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-6 text-center">
                                <svg class="mx-auto h-12 w-12 text-dark-text-secondary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <p class="mt-4 text-sm text-dark-text-secondary">Tidak ada data iuran</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($iurans->hasPages())
            <div class="p-4 border-t border-dark-border">
                {{ $iurans->links() }}
            </div>
        @endif
    </div>
@endsection