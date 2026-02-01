@extends('layouts.app')

@section('title', 'Edit Iuran - Sistem Iuran Warga')

@section('content')
    <!-- Page Header -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-white">Edit Iuran</h2>
            <p class="text-sm text-dark-text-secondary mt-1">Perbarui data iuran: {{ $iuran->warga->nama ?? '-' }} -
                {{ $iuran->nama_bulan }} {{ $iuran->tahun }}</p>
        </div>
        <a href="{{ route('iuran.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-lg border border-dark-border py-2.5 px-5 text-sm font-medium text-dark-text hover:bg-dark-card transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Error Alert -->
    @if(session('error'))
        <div class="mb-6 flex items-center gap-3 rounded-lg bg-danger/10 border border-danger/20 p-4">
            <svg class="w-5 h-5 text-danger flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm text-danger">{{ session('error') }}</p>
        </div>
    @endif

    <!-- Form Card -->
    <div class="rounded-lg bg-dark-card border border-dark-border">
        <div class="border-b border-dark-border py-4 px-6">
            <h3 class="font-medium text-white">Form Data Iuran</h3>
        </div>

        <form action="{{ route('iuran.update', $iuran) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Warga (Readonly) -->
                <div class="md:col-span-2">
                    <label class="mb-2.5 block text-sm font-medium text-white">Warga</label>
                    <div class="flex items-center gap-3 p-4 rounded-lg bg-dark-bg border border-dark-border">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($iuran->warga->nama ?? '-') }}&background=3b82f6&color=fff"
                            alt="" class="h-10 w-10 rounded-full">
                        <div>
                            <p class="text-sm font-medium text-white">{{ $iuran->warga->nama ?? '-' }}</p>
                            <p class="text-xs text-dark-text-secondary">{{ $iuran->warga->alamat ?? '-' }}</p>
                        </div>
                    </div>
                    <input type="hidden" name="warga_id" value="{{ $iuran->warga_id }}">
                </div>

                <!-- Bulan -->
                <div>
                    <label for="bulan" class="mb-2.5 block text-sm font-medium text-white">Bulan <span
                            class="text-danger">*</span></label>
                    <select name="bulan" id="bulan"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('bulan') border-danger @enderror">
                        <option value="">Pilih Bulan</option>
                        @php
                            $bulanList = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
                        @endphp
                        @foreach($bulanList as $key => $nama)
                            <option value="{{ $key }}" {{ old('bulan', $iuran->bulan) == $key ? 'selected' : '' }}>{{ $nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('bulan')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tahun -->
                <div>
                    <label for="tahun" class="mb-2.5 block text-sm font-medium text-white">Tahun <span
                            class="text-danger">*</span></label>
                    <select name="tahun" id="tahun"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('tahun') border-danger @enderror">
                        <option value="">Pilih Tahun</option>
                        @for($y = date('Y'); $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ old('tahun', $iuran->tahun) == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                    @error('tahun')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div>
                    <label for="jumlah" class="mb-2.5 block text-sm font-medium text-white">Jumlah (Rp) <span
                            class="text-danger">*</span></label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $iuran->jumlah) }}"
                        placeholder="Masukkan jumlah iuran"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text placeholder-dark-text-secondary focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('jumlah') border-danger @enderror">
                    @error('jumlah')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="mb-2.5 block text-sm font-medium text-white">Status <span
                            class="text-danger">*</span></label>
                    <select name="status" id="status"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('status') border-danger @enderror">
                        <option value="">Pilih Status</option>
                        <option value="lunas" {{ old('status', $iuran->status) === 'lunas' ? 'selected' : '' }}>Lunas</option>
                        <option value="belum_lunas" {{ old('status', $iuran->status) === 'belum_lunas' ? 'selected' : '' }}>
                            Belum Lunas</option>
                    </select>
                    @error('status')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Bayar -->
                <div>
                    <label for="tanggal_bayar" class="mb-2.5 block text-sm font-medium text-white">Tanggal Bayar</label>
                    <input type="date" name="tanggal_bayar" id="tanggal_bayar"
                        value="{{ old('tanggal_bayar', $iuran->tanggal_bayar?->format('Y-m-d')) }}"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('tanggal_bayar') border-danger @enderror">
                    @error('tanggal_bayar')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="mb-2.5 block text-sm font-medium text-white">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3" placeholder="Keterangan tambahan (opsional)"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text placeholder-dark-text-secondary focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('keterangan') border-danger @enderror">{{ old('keterangan', $iuran->keterangan) }}</textarea>
                    @error('keterangan')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('iuran.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-dark-border py-2.5 px-5 text-sm font-medium text-dark-text hover:bg-dark-bg transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary-600 py-2.5 px-5 text-sm font-medium text-white hover:bg-primary-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection