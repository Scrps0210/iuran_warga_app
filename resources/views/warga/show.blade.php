@extends('layouts.app')

@section('title', 'Detail Warga - Sistem Iuran Warga')

@section('content')
    <!-- Page Header -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-white">Detail Warga</h2>
            <p class="text-sm text-dark-text-secondary mt-1">Informasi lengkap data warga</p>
        </div>
        <a href="{{ route('warga.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-lg border border-dark-border py-2.5 px-5 text-sm font-medium text-dark-text hover:bg-dark-card transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="xl:col-span-1">
            <div class="rounded-lg bg-dark-card border border-dark-border p-6">
                <div class="flex flex-col items-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($warga->nama) }}&background=3b82f6&color=fff&size=128"
                        alt="" class="h-24 w-24 rounded-full mb-4">
                    <h3 class="text-xl font-semibold text-white">{{ $warga->nama }}</h3>
                    <p class="text-sm text-dark-text-secondary">{{ $warga->alamat }}</p>
                    <span
                        class="mt-3 inline-flex items-center rounded-full px-3 py-1 text-xs font-medium {{ $warga->status === 'aktif' ? 'bg-success/10 text-success' : 'bg-danger/10 text-danger' }}">
                        {{ ucfirst(str_replace('_', ' ', $warga->status)) }}
                    </span>
                </div>

                <div class="mt-6 space-y-4">
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-dark-bg">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary-500/10">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-dark-text-secondary">NIK</p>
                            <p class="text-sm font-medium text-white font-mono">{{ $warga->nik }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-lg bg-dark-bg">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-success/10">
                            <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-dark-text-secondary">No. HP</p>
                            <p class="text-sm font-medium text-white">{{ $warga->no_hp ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-lg bg-dark-bg">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-info/10">
                            <svg class="w-5 h-5 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-dark-text-secondary">Jenis Kelamin</p>
                            <p class="text-sm font-medium text-white">
                                {{ $warga->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <a href="{{ route('warga.edit', $warga) }}"
                        class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg bg-primary-600 py-2.5 px-4 text-sm font-medium text-white hover:bg-primary-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('warga.destroy', $warga) }}" method="POST" class="flex-1"
                        onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg border border-danger text-danger py-2.5 px-4 text-sm font-medium hover:bg-danger/10 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Iuran History -->
        <div class="xl:col-span-2">
            <div class="rounded-lg bg-dark-card border border-dark-border">
                <div class="p-6 border-b border-dark-border flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-white">Riwayat Iuran</h4>
                        <p class="text-sm text-dark-text-secondary">Semua transaksi iuran warga ini</p>
                    </div>
                    <a href="{{ route('iuran.create') }}?warga_id={{ $warga->id }}"
                        class="inline-flex items-center gap-2 rounded-lg bg-primary-600 py-2 px-4 text-sm font-medium text-white hover:bg-primary-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Iuran
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 gap-4 p-6 border-b border-dark-border">
                    <div class="rounded-lg bg-success/10 p-4">
                        <p class="text-sm text-success">Total Lunas</p>
                        <p class="text-2xl font-bold text-success mt-1">Rp
                            {{ number_format($warga->total_iuran_lunas, 0, ',', '.') }}</p>
                    </div>
                    <div class="rounded-lg bg-danger/10 p-4">
                        <p class="text-sm text-danger">Belum Lunas</p>
                        <p class="text-2xl font-bold text-danger mt-1">Rp
                            {{ number_format($warga->total_iuran_belum_lunas, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-dark-bg/50 border-b border-dark-border">
                                <th class="py-3 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase">
                                    Periode</th>
                                <th class="py-3 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase">
                                    Jumlah</th>
                                <th class="py-3 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase">Tgl
                                    Bayar</th>
                                <th class="py-3 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase">
                                    Status</th>
                                <th class="py-3 px-6 text-center text-xs font-medium text-dark-text-secondary uppercase">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-dark-border">
                            @forelse($warga->iurans as $iuran)
                                <tr class="hover:bg-dark-bg/30 transition-colors">
                                    <td class="py-3 px-6 text-sm text-white">{{ $iuran->nama_bulan }} {{ $iuran->tahun }}</td>
                                    <td class="py-3 px-6 text-sm text-white font-medium">Rp
                                        {{ number_format($iuran->jumlah, 0, ',', '.') }}</td>
                                    <td class="py-3 px-6 text-sm text-dark-text">
                                        {{ $iuran->tanggal_bayar ? $iuran->tanggal_bayar->format('d/m/Y') : '-' }}</td>
                                    <td class="py-3 px-6">
                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $iuran->status === 'lunas' ? 'bg-success/10 text-success' : 'bg-danger/10 text-danger' }}">
                                            {{ ucfirst(str_replace('_', ' ', $iuran->status)) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('iuran.edit', $iuran) }}"
                                                class="inline-flex items-center justify-center w-7 h-7 rounded bg-warning/10 text-warning hover:bg-warning/20 transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 px-6 text-center text-dark-text-secondary">
                                        Belum ada data iuran
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