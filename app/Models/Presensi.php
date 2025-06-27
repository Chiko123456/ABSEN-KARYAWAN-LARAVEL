<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Pastikan ini ada

class Presensi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // === TAMBAHKAN BLOK KODE INI ===
    protected $fillable = [
        'user_id',
        'tanggal_presensi',
        'jam_masuk',
        'jam_pulang',
        'foto_masuk',
        'foto_pulang',
        'status',
    ];
    // === AKHIR DARI BLOK KODE ===

    /**
     * Mendefinisikan relasi ke model User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}