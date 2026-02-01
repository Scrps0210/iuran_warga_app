@extends('layouts.app')

@section('title', 'Data Warga - Sistem Iuran Warga')

@section('content')
    <!-- Page Header -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-2xl font-bold text-white">Data Warga</h2>
        <a href="{{ route('warga.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary-600 py-2.5 px-5 text-sm font-medium text-white hover:bg-primary-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Warga
        </a>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 rounded-lg bg-success/10 border border-success/20 p-4">
            <svg class="w-5 h-5 text-success flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm text-success">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Search & Filter -->
    <div class="mb-6 rounded-lg bg-dark-card border border-dark-border p-4">
        <form action="{{ route('warga.index') }}" method="GET" class="max-w-4xl mx-auto flex flex-col sm:flex-row gap-4">
            <div class="relative flex-1">
                <span class="absolute left-4 top-1/2 -translate-y-1/2">
                    <svg class="w-5 h-5 text-dark-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama, NIK, atau alamat..."
                    class="w-full bg-dark-bg border border-dark-border rounded-lg py-2.5 pl-12 pr-4 text-dark-text placeholder-dark-text-secondary focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
            </div>
            <button type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary-600 py-2.5 px-5 text-sm font-medium text-white hover:bg-primary-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Cari
            </button>
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
                            NIK</th>
                        <th
                            class="py-4 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            No. HP</th>
                        <th
                            class="py-4 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            J. Kelamin</th>
                        <th
                            class="py-4 px-6 text-left text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            Status</th>
                        <th
                            class="py-4 px-6 text-center text-xs font-medium text-dark-text-secondary uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-dark-border">
                    @forelse($wargas as $warga)
                        <tr class="hover:bg-dark-bg/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($warga->nama) }}&background=3b82f6&color=fff"
                                        alt="" class="h-10 w-10 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-white">{{ $warga->nama }}</p>
                                        <p class="text-xs text-dark-text-secondary">{{ $warga->alamat }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-sm text-dark-text font-mono">{{ $warga->nik }}</td>
                            <td class="py-4 px-6 text-sm text-dark-text">{{ $warga->no_hp ?? '-' }}</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center gap-1.5 text-sm text-dark-text">
                                    @if($warga->jenis_kelamin === 'L')
                                        <svg class="w-4 h-4 text-info" fill="currentColor" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                        </svg>
                                        Laki-laki
                                    @else
                                        <svg class="w-4 h-4 text-danger" fill="currentColor" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                        </svg>
                                        Perempuan
                                    @endif
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $warga->status === 'aktif' ? 'bg-success/10 text-success' : 'bg-danger/10 text-danger' }}">
                                    {{ ucfirst(str_replace('_', ' ', $warga->status)) }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('warga.show', $warga) }}"
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-info/10 text-info hover:bg-info/20 transition-colors"
                                        title="Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('warga.edit', $warga) }}"
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-warning/10 text-warning hover:bg-warning/20 transition-colors"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('warga.destroy', $warga) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data warga ini?')">
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
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="mt-4 text-sm text-dark-text-secondary">Tidak ada data warga</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($wargas->hasPages())
            <div class="p-4 border-t border-dark-border">
                {{ $wargas->links() }}
            </div>
        @endif
    </div>
@endsection