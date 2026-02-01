<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('iuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga')->onDelete('cascade');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->decimal('jumlah', 12, 2);
            $table->date('tanggal_bayar')->nullable();
            $table->enum('status', ['lunas', 'belum_lunas'])->default('belum_lunas');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Unique constraint: satu warga hanya bisa memiliki satu iuran per bulan per tahun
            $table->unique(['warga_id', 'bulan', 'tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran');
    }
};
