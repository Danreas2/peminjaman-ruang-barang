<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('level', ['umum', 'karyawan']);
            $table->string('nip')->nullable();
            $table->string('nama_organisasi')->nullable();
            $table->string('email');
            $table->date('rencana_pinjam');
            $table->date('rencana_kembali');
            $table->time('jam_pinjam');
            $table->time('jam_selesai');
            $table->enum('verifikasi', ['0', '1', '2']);
            $table->enum('tipe', ['kendaraan', 'ruangan', 'barang']);
            $table->integer('id_reff');
            $table->integer('jumlah')->nullable();
            $table->tinyInteger('stok_berkurang')->nullable();
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
        Schema::dropIfExists('peminjamen');
    }
}
