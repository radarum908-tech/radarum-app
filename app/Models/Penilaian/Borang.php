<?php

namespace App\Models\Penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Borang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kampus',
        'nama_pengisi',
        'pilar',
        'kriteria',
        'sub_kriteria',
        'indikator_penilaian',
        'link_evidence',
        'catatan_tambahan',
        'akun_id',
        'nilai',
        'catatan_penilai',
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'akun_id', 'id');
}
}
