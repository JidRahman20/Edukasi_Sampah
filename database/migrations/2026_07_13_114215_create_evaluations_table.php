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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('origin')->nullable(); // Asal Dusun/Kelas
            $table->enum('material_clarity', ['Sangat Mudah', 'Mudah', 'Cukup', 'Sulit']);
            $table->enum('understanding_improvement', ['Ya', 'Cukup', 'Belum']);
            $table->enum('intention_to_sort', ['Ya', 'Mungkin', 'Belum']);
            $table->text('website_opinion')->nullable();
            $table->text('suggestion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
