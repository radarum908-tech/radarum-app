<?php

namespace App\Models\Penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $fillable = ['kriteria_id', 'sub_kriteria'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function indikatorPenilaians()
    {
        return $this->hasMany(IndikatorPenilaian::class);
    }
}
