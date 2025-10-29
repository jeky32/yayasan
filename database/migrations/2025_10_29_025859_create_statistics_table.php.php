<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id('stat_id');
            $table->string('stat_name', 100)->unique();
            $table->integer('stat_value');
            $table->string('stat_unit', 20)->nullable();
            $table->text('description')->nullable();
            $table->timestamp('last_updated')->useCurrent()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
