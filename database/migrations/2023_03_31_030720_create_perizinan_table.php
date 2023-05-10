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
        Schema::create('tb_perizinan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('nama_perizinan');
            $table->string('lokasi');
            $table->string('instansi_terkait');
            // $table->string('perkiraan_proses');
            $table->integer('status');
            $table->timestamp('created_at')->useCurrent()->defaultFormat('d/m/Y H:i:s');
            $table->timestamp('updated_at')->useCurrent()->defaultFormat('d/m/Y H:i:s');
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_perizinan');
    }
};
