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
        Schema::create('tb_dokumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_perpanjangan');
            $table->string('doc');
            $table->timestamp('created_at')->useCurrent()->defaultFormat('d/m/Y H:i:s');
            $table->timestamp('updated_at')->useCurrent()->defaultFormat('d/m/Y H:i:s');
            $table->boolean('status');
            $table->foreign('id_perpanjangan')->references('id')->on('tb_perpanjangan')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dokumen');
    }
};
