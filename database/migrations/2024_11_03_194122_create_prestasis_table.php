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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nama_kompetisi');
            $table->string('jenis_kompetisi');
            $table->string('jenjang');
            $table->string('pencapaian');
            $table->string('penyelenggara');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->date('tanggal_upload');
            $table->string('tempat_kompetisi');
            $table->text('deskripsi');
            $table->string('file_bukti')->default(null);
            $table->string('konfirmasi')->default(null);
            $table->string('alasan')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
