<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id('message_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20)->nullable();
            $table->string('subject');
            $table->text('message');
            $table->enum('status', ['Unread', 'Read', 'Replied'])->default('Unread');
            $table->timestamp('replied_at')->nullable();
            $table->foreignId('replied_by')->nullable()->constrained('staff', 'staff_id')->nullOnDelete();
            $table->text('reply_message')->nullable();
            $table->timestamps();
            
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
