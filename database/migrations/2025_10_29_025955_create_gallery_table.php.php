<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->id('gallery_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Untuk compatibility dengan controller lama
            $table->string('image_url')->nullable(); // Untuk compatibility dengan database lama
            $table->string('category', 50)->nullable();
            $table->enum('type', ['photo', 'video'])->default('photo');
            $table->string('video_url')->nullable();
            $table->timestamp('upload_date')->useCurrent();
            $table->foreignId('location_id')->nullable()->constrained('locations', 'location_id')->nullOnDelete();
            $table->string('photographer', 100)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('display_order')->default(0);
            $table->timestamps();
            
            $table->index('category');
            $table->index('type');
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery');
    }
};
