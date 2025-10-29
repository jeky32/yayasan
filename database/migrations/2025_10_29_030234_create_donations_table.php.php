<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id('donation_id');
            $table->string('donation_code', 50)->unique()->nullable();
            $table->string('donor_name', 100)->nullable();
            $table->enum('donor_type', ['Individual', 'Company', 'Organization'])->default('Individual');
            $table->string('donor_email', 100)->nullable();
            $table->string('donor_phone', 20)->nullable();
            $table->text('donor_address')->nullable();
            $table->decimal('amount', 15, 2);
            $table->timestamp('donation_date')->useCurrent();
            $table->enum('payment_method', ['Transfer', 'Cash', 'Check', 'Online', 'Other'])->nullable();
            $table->string('payment_reference', 100)->nullable();
            $table->enum('status', ['Pending', 'Verified', 'Completed', 'Failed', 'Refunded'])->default('Pending');
            $table->string('purpose')->nullable();
            $table->foreignId('program_id')->nullable()->constrained('programs', 'program_id')->nullOnDelete();
            $table->boolean('is_recurring')->default(false);
            $table->boolean('is_anonymous')->default(false);
            $table->boolean('receipt_sent')->default(false);
            $table->string('receipt_number', 50)->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('staff', 'staff_id')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('donation_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
