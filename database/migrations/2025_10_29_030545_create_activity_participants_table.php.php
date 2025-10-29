<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Tabel ini menyimpan data peserta kegiatan/aktivitas.
     * Merupakan tabel penghubung (pivot table) antara:
     * - activities (kegiatan)
     * - beneficiaries (anak asuh)
     * 
     * Dengan tambahan informasi status kehadiran dan penilaian.
     */
    public function up(): void
    {
        Schema::create('activity_participants', function (Blueprint $table) {
            // Primary Key
            $table->id('participant_id');
            
            // Foreign Keys (Relasi Many-to-Many)
            $table->foreignId('activity_id')
                ->constrained('activities', 'activity_id')
                ->cascadeOnDelete()
                ->comment('ID Kegiatan');
            
            $table->foreignId('beneficiary_id')
                ->constrained('beneficiaries', 'beneficiary_id')
                ->cascadeOnDelete()
                ->comment('ID Anak Asuh');
            
            // Participation Status
            $table->enum('participation_status', [
                'Registered', // Terdaftar
                'Attended',   // Hadir
                'Absent',     // Tidak Hadir
                'Cancelled'   // Dibatalkan
            ])->default('Registered')->comment('Status kehadiran');
            
            // Performance Rating
            $table->integer('performance_rating')
                ->nullable()
                ->comment('Penilaian performa (1-5)');
            
            // Check constraint untuk rating (1-5)
            // Note: Check constraint didukung MySQL 8.0.16+, MariaDB 10.2.1+
            $table->check('performance_rating BETWEEN 1 AND 5 OR performance_rating IS NULL');
            
            // Additional Notes
            $table->text('notes')
                ->nullable()
                ->comment('Catatan tambahan tentang peserta');
            
            // Timestamps
            $table->timestamps();
            
            // Unique constraint - Satu anak tidak bisa terdaftar 2x dalam kegiatan yang sama
            $table->unique(['activity_id', 'beneficiary_id'], 'unique_activity_beneficiary');
            
            // Indexes untuk performa query
            $table->index('participation_status', 'idx_participation_status');
            $table->index(['activity_id', 'participation_status'], 'idx_activity_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_participants');
    }
};
