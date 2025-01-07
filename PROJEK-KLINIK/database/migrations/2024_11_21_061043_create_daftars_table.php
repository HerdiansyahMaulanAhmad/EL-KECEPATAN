<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('daftars')) {
            Schema::create('daftars', function (Blueprint $table) {
                $table->id();
                $table->foreignId('pasien_id')->constrained()->onDelete('cascade');
                $table->date('tanggal_daftar');
                $table->foreignId('poli_id')->constrained()->onDelete('cascade');
                $table->text('keluhan');
                $table->varchar('diagnosis')->nullable();
                $table->varchar('tindakan')->nullable();
                $table->timestamps();
            });        
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftars');
    }
};
