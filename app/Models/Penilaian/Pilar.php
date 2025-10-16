<?php

namespace App\Models\Penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilar extends Model
{
    use HasFactory;

    protected $fillable = ['pilar'];

    public function kriterias()
    {
        return $this->hasMany(Kriteria::class);
    }
}
