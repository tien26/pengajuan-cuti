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
        Schema::create('pengajuan_cuti', function (Blueprint $table) {
            $table->id();
            $table->string('nomor', 15);
            $table->string('keterangan_karyawan', 200);
            $table->string('keterangan_hrd', 200)->nullable();
            $table->unsignedBigInteger('karyawan_id');
            $table->foreign('karyawan_id')->references('id')->on('users')->onDelete('restrict');
            $table->bigInteger('hrd_id')->nullable();
            $table->date('awal');
            $table->date('akhir');
            $table->date('tgl_setuju')->nullable();
            $table->string('status', 100)->nullable();
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_cuti');
    }
};
