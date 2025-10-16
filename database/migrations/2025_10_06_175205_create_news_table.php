<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->text('summary')->nullable();   // ringkasan (buat kartu)
            $table->mediumText('content');         // isi berita (HTML/markdown)
            $table->string('cover_path', 500)->nullable(); // path gambar cover di storage
            $table->enum('status', ['draft','published'])->default('published');
            $table->dateTime('published_at')->nullable();
            $table->timestamps();

            $table->index(['status','published_at']);
        });
    }
    public function down(): void { Schema::dropIfExists('news'); }
};
