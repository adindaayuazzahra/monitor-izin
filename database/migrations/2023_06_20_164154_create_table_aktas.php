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
        Schema::create('tb_akta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('nama_akta');
            $table->string('nomor_akta');
            $table->biginteger('tahun');
            $table->string('doc_akta');
            $table->string('token')->nullable();
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
        Schema::dropIfExists('tb_akta');
    }
};
