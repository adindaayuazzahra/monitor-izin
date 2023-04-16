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
        Schema::create('tb_perpanjangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_perizinan');
            $table->date('tanggal_registrasi')->nullable();
            $table->date('tanggal_registrasi_ulang')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->bigInteger('alokasi_biaya');
            $table->string('catatan')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->boolean('status_perpanjangan');
            $table->boolean('status_aktif');
            $table->timestamp('created_at')->useCurrent()->defaultFormat('d/m/Y H:i:s');
            $table->timestamp('updated_at')->useCurrent()->defaultFormat('d/m/Y H:i:s');
            $table->foreign('id_perizinan')->references('id')->on('tb_perizinan')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_perpanjangan');
    }
};
