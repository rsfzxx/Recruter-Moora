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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki Laki', 'Perempuan']);
            $table->enum('status_perkawinan', ['Sudah Menikah', 'Belum Menikah']);
            $table->enum('pengalaman_kerja', ['-1', '1', '2', '3', '4', '5', '5+']);
            $table->decimal('ipk', 3, 2);
            $table->integer('usia');
            $table->integer('nilai_psikotest');
            $table->integer('nilai_tes_tertulis');
            $table->integer('nilai_wawancara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
