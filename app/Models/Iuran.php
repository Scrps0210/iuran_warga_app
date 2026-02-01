<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Iuran extends Model
{
    protected $table = 'iuran';

    protected $fillable = [
        'warga_id',
        'bulan',
        'tahun',
        'jumlah',
        'tanggal_bayar',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah' => 'decimal:2',
    ];

    /**
     * Get the warga that owns the iuran.
     * Relasi Many-to-One: Banyak Iuran dimiliki oleh satu Warga
     */
    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class);
    }

    /**
     * Get nama bulan dalam bahasa Indonesia
     */
    public function getNamaBulanAttribute(): string
    {
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        return $bulanIndonesia[$this->bulan] ?? '';
    }
}
