<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggarann', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');  // Mengubah method ke string untuk kolom 'no_surat'
            $table->date('tanggal');  // Menggunakan date untuk tanggal
            $table->string('perihal');  // Menggunakan string untuk perihal
            $table->text('persoalan')->nullable();  // Menggunakan text untuk persoalan
            $table->text('peranggapan')->nullable();  // Menggunakan text untuk peranggapan
            $table->text('fakta')->nullable();  // Menggunakan text untuk fakta
            $table->text('analisis')->nullable();  // Menggunakan text untuk analisis
            $table->text('kesimpulan')->nullable();  // Menggunakan text untuk kesimpulan
            $table->text('saran')->nullable();  // Menggunakan text untuk saran
            $table->unsignedBigInteger('id_user');  // Menyimpan ID user sebagai unsignedBigInteger
            $table->string('sifat')->nullable();  // Menggunakan string untuk sifat
            $table->text('catatan')->nullable();  // Menggunakan text untuk catatan
            $table->string('status')->nullable();  // Menggunakan string untuk status
            $table->text('keterangan')->nullable();  // Menggunakan text untuk keterangan
            $table->date('alarm')->nullable();  // Menggunakan date untuk alarm
            $table->string('lampiran')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggarann');
    }
};
