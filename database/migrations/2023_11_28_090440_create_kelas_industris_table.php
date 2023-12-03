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
        Schema::create('kelas_industris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_industri');
            $table->string('jenis_industri');
            $table->string('asal_sekolah');
            $table->string('email');
            $table->string('alamat');
            $table->string('document');
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_industris');
    }
};
