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
        Schema::create('verifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nkk');
            $table->string('nik');
            $table->string('nama');
            $table->string('t_lahir');
            $table->string('tgl_lahir');
            $table->enum('kelamin',['L','P'])->default('L');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('tps');
            $table->string('kel');
            $table->string('kec');
            $table->string('nohp');
            $table->string('nama_relawan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasis');
    }
};
