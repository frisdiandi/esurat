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
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('perihal');
            $table->string('Persoalan');
            $table->string('Perangapan');
            $table->string('Fakta');
            $table->string('Analisis');
            $table->string('Kesimpulan');
            $table->string('Saran');
            $table->string('id_user');
<<<<<<< HEAD
=======
            $table->string('lampiran');
>>>>>>> 22eb47e17e05ff7b632cc7bed80c0cd90f15a72c
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('permintaan');
    }
};
