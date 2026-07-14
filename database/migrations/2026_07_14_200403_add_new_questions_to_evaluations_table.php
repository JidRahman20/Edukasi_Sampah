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
        Schema::table('evaluations', function (Blueprint $table) {
            $table->enum('habit_frequency', ['Selalu', 'Sering', 'Kadang-kadang', 'Jarang', 'Tidak Pernah'])->after('intention_to_sort')->nullable();
            $table->enum('knowledge_organic', ['Ya sudah paham', 'Masih bingung', 'Belum bisa'])->after('habit_frequency')->nullable();
            $table->string('favorite_material')->after('knowledge_organic')->nullable();
            $table->enum('facilities_rating', ['Sangat Memadai', 'Cukup', 'Kurang Memadai'])->after('favorite_material')->nullable();
            $table->enum('advocacy_likelihood', ['Sangat Mungkin', 'Mungkin', 'Kurang Mungkin'])->after('facilities_rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropColumn([
                'habit_frequency',
                'knowledge_organic',
                'favorite_material',
                'facilities_rating',
                'advocacy_likelihood'
            ]);
        });
    }
};
