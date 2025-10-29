<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('program_id');
            $table->string('program_name');
            $table->string('program_code', 50)->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('objectives')->nullable();
            $table->integer('target_participants')->nullable();
            $table->integer('actual_participants')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['Planned', 'Active', 'Completed', 'Cancelled'])->default('Planned');
            $table->decimal('budget', 15, 2)->nullable();
            $table->decimal('actual_cost', 15, 2)->nullable();
            $table->foreignId('location_id')->nullable()->constrained('locations', 'location_id')->nullOnDelete();
            $table->foreignId('coordinator_id')->nullable()->constrained('staff', 'staff_id')->nullOnDelete();
            $table->string('image_url')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
