<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id('staff_id');
            $table->string('employee_number', 50)->unique();
            $table->string('full_name', 100);
            $table->string('position', 100)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('photo_url')->nullable();
            $table->date('join_date')->nullable();
            $table->date('resign_date')->nullable();
            $table->enum('employment_status', ['Active', 'Resigned', 'Suspended'])->default('Active');
            $table->foreignId('location_id')->nullable()->constrained('locations', 'location_id')->nullOnDelete();
            $table->string('education', 100)->nullable();
            $table->text('certification')->nullable();
            $table->decimal('salary', 15, 2)->nullable();
            $table->string('bank_account', 50)->nullable();
            $table->string('emergency_contact', 100)->nullable();
            $table->string('emergency_phone', 20)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index('employment_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
