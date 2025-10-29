<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id('news_id');
            $table->string('title'); // Judul berita
            $table->string('slug')->unique(); // Slug unik untuk SEO
            $table->text('excerpt')->nullable(); // Ringkasan
            $table->longText('content')->nullable(); // Isi berita
            $table->string('author', 100)->nullable(); // Penulis
            $table->string('image')->nullable(); // Path gambar
            $table->string('category', 50)->nullable(); // Kategori berita
            $table->string('source_url')->nullable(); // Sumber eksternal
            $table->enum('status', ['Draft', 'Published', 'Archived'])->default('Draft');
            $table->integer('views')->default(0); // Jumlah views
            $table->timestamp('publish_date')->nullable(); // Tanggal terbit
            $table->timestamp('published_at')->nullable(); // Alias untuk publish_date
            $table->timestamps(); // created_at & updated_at
            
            $table->index('slug');
            $table->index('status');
            $table->index('category');
            $table->index('publish_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
