<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Tabel ini menyimpan data kegiatan/aktivitas yang dilakukan
     * di Yayasan Astagina Adi Cahya seperti:
     * - Kegiatan Pendidikan
     * - Kegiatan Rekreasi
     * - Pemeriksaan Kesehatan
     * - Pelatihan Keterampilan
     * - Konseling
     * - Dan lain-lain
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            // Primary Key
            $table->id('activity_id');
            
            // Basic Information
            $table->string('activity_name')->comment('Nama kegiatan');
            $table->enum('activity_type', [
                'Education',   // Pendidikan
                'Recreation',  // Rekreasi
                'Health',      // Kesehatan
                'Skills',      // Keterampilan
                'Counseling',  // Konseling
                'Other'        // Lainnya
            ])->nullable()->comment('Tipe kegiatan');
            
            $table->text('description')->nullable()->comment('Deskripsi kegiatan');
            
            // Schedule Information
            $table->date('activity_date')->comment('Tanggal kegiatan');
            $table->time('start_time')->nullable()->comment('Waktu mulai');
            $table->time('end_time')->nullable()->comment('Waktu selesai');
            
            // Location & Instructor
            $table->foreignId('location_id')
                ->nullable()
                ->constrained('locations', 'location_id')
                ->nullOnDelete()
                ->comment('Lokasi kegiatan');
            
            $table->foreignId('instructor_id')
                ->nullable()
                ->constrained('staff', 'staff_id')
                ->nullOnDelete()
                ->comment('Instruktur/Pembimbing');
            
            // Capacity
            $table->integer('max_participants')
                ->nullable()
                ->comment('Maksimal peserta');
            
            // Additional Notes
            $table->text('notes')->nullable()->comment('Catatan tambahan');
            
            // Timestamps
            $table->timestamps();
            
            // Indexes untuk performa query
            $table->index('activity_date', 'idx_activity_date');
            $table->index('activity_type', 'idx_activity_type');
            $table->index(['activity_date', 'location_id'], 'idx_date_location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
