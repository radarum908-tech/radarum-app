<?php

namespace App\Models\Penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['pilar_id', 'kriteria'];

    public function pilar()
    {
        return $this->belongsTo(Pilar::class);
    }

    public function subKriterias()
    {
        return $this->hasMany(SubKriteria::class);
    }
}
