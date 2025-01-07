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
        Schema::table('pasiens', function (Blueprint $table) {
                $table->date('umur')->change(); // Mengubah tipe data kolom 'umur' menjadi DATE
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasiens', function (Blueprint $table) {
                $table->integer('umur')->change(); // Mengembalikan tipe data kolom 'umur' menjadi INT
            });
    }
};
