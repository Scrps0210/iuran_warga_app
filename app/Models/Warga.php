<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warga extends Model
{
    protected $table = 'warga';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'status',
    ];

    /**
     * Get all iuran for this warga.
     * Relasi One-to-Many: Satu Warga memiliki banyak Iuran
     */
    public function iurans(): HasMany
    {
        return $this->hasMany(Iuran::class);
    }

    /**
     * Get total iuran yang sudah dibayar
     */
    public function getTotalIuranLunasAttribute(): float
    {
        return $this->iurans()->where('status', 'lunas')->sum('jumlah');
    }

    /**
     * Get total iuran yang belum dibayar
     */
    public function getTotalIuranBelumLunasAttribute(): float
    {
        return $this->iurans()->where('status', 'belum_lunas')->sum('jumlah');
    }
}
