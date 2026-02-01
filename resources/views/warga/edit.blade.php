@extends('layouts.app')

@section('title', 'Edit Warga - Sistem Iuran Warga')

@section('content')
    <!-- Page Header -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-white">Edit Warga</h2>
            <p class="text-sm text-dark-text-secondary mt-1">Perbarui data warga: {{ $warga->nama }}</p>
        </div>
        <a href="{{ route('warga.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-lg border border-dark-border py-2.5 px-5 text-sm font-medium text-dark-text hover:bg-dark-card transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="rounded-lg bg-dark-card border border-dark-border">
        <div class="border-b border-dark-border py-4 px-6">
            <h3 class="font-medium text-white">Form Data Warga</h3>
        </div>

        <form action="{{ route('warga.update', $warga) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama -->
                <div>
                    <label for="nama" class="mb-2.5 block text-sm font-medium text-white">Nama Lengkap <span
                            class="text-danger">*</span></label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $warga->nama) }}"
                        placeholder="Masukkan nama lengkap"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text placeholder-dark-text-secondary focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('nama') border-danger @enderror">
                    @error('nama')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIK -->
                <div>
                    <label for="nik" class="mb-2.5 block text-sm font-medium text-white">NIK <span
                            class="text-danger">*</span></label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik', $warga->nik) }}"
                        placeholder="Masukkan 16 digit NIK" maxlength="16"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text placeholder-dark-text-secondary focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('nik') border-danger @enderror">
                    @error('nik')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label for="alamat" class="mb-2.5 block text-sm font-medium text-white">Alamat <span
                            class="text-danger">*</span></label>
                    <textarea name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat lengkap"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text placeholder-dark-text-secondary focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('alamat') border-danger @enderror">{{ old('alamat', $warga->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No HP -->
                <div>
                    <label for="no_hp" class="mb-2.5 block text-sm font-medium text-white">No. Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $warga->no_hp) }}"
                        placeholder="Contoh: 081234567890"
                        class="w-full rounded-lg border border-dark-border bg-dark-bg py-3 px-4 text-dark-text placeholder-dark-text-secondary focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 @error('no_hp') border-danger @enderror">
                    @error('no_hp')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="mb-2.5 block text-sm font-medium text-white">Jenis Kelamin <span
                            class="text-danger">*</span></label>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin', $warga->jenis_kelamin) === 'L' ? 'checked' : '' }}
                                class="h-4 w-4 text-primary-600 bg-dark-bg border-dark-border focus:ring-primary-500/20">
                            <span class="text-sm text-dark-text">Laki-laki</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin', $warga->jenis_kelamin) === 'P' ? 'checked' : '' }}
                                class="h-4 w-4 text-primary-600 bg-dark-bg border-dark-border focus:ring-primary-500/20">
                            <span class="text-sm text-dark-text">Perempuan</span>
                        </label>
                    </div>
                    @error('jenis_kelamin')
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
                        <option value="aktif" {{ old('status', $warga->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ old('status', $warga->status) === 'tidak_aktif' ? 'selected' : '' }}>
                            Tidak Aktif</option>
                    </select>
                    @error('status')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('warga.index') }}"
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