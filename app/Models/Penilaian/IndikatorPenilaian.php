<?php

namespace App\Models\Penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorPenilaian extends Model
{
    use HasFactory;

    protected $fillable = ['sub_kriteria_id', 'indikator_penilaian'];

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }
}
