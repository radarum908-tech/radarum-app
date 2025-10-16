<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','summary','content','cover_path','status','published_at'
    ];

    protected $casts = ['published_at' => 'datetime'];

    // untuk listing publik (hanya published dan waktunya sudah lewat)
    public function scopePublished($q) {
        return $q->where('status','published')
                 ->where(function($qq){
                    $qq->whereNull('published_at')->orWhere('published_at','<=',now());
                 });
    }

    // url cover (otomatis pakai storage)
    public function coverUrl(): ?string {
        return $this->cover_path ? asset('storage/'.$this->cover_path) : null;
    }
}
