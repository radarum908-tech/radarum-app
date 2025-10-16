<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Penilaian\Borang;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'akun';

    protected $fillable = [
        'nama_kampus',
        'alamat',
        'provinsi',
        'email_kampus',
        'password',
        'nomor_telepon',
        'website_kampus',
        'koordinator_program',
        'email_koordinator',
        'logo_kampus',
        'role',
        'avg_pilar_total',
    ];

    // Supaya email_kampus dikenali sebagai username
    public function username()
    {
        return 'email_kampus';
    }

    // Supaya Auth::attempt bisa menemukan password
    public function getAuthPassword()
    {
        return $this->attributes['password'];
    }

    // Supaya field password tidak ikut di-serialize ke JSON
    protected $hidden = ['password'];

    public function borangs()
{
    return $this->hasMany(Borang::class, 'akun_id', 'id');
}

}
