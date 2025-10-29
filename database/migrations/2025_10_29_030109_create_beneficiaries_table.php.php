<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id('beneficiary_id');
            $table->string('registration_number', 50)->unique();
            $table->string('full_name', 100);
            $table->string('nickname', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth', 100)->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->enum('blood_type', ['A', 'B', 'AB', 'O', 'Unknown'])->nullable();
            $table->string('religion', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('emergency_contact', 100)->nullable();
            $table->string('emergency_phone', 20)->nullable();
            $table->string('emergency_relation', 50)->nullable();
            $table->date('entry_date')->nullable();
            $table->date('exit_date')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Graduated', 'Transferred'])->default('Active');
            $table->string('education_level', 50)->nullable();
            $table->string('school_name', 200)->nullable();
            $table->text('special_needs')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('allergies')->nullable();
            $table->foreignId('location_id')->nullable()->constrained('locations', 'location_id')->nullOnDelete();
            $table->string('photo_url')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
