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
    Schema::create('barang_keluar', function (Blueprint $table) {
      $table->id();
      $table->foreignId('id_barang')->nullable()->constrained('barang')->onDelete('cascade');
      $table->unsignedInteger('jumlah');
      $table->string('penerima', 100);
      $table->text('keterangan');
      $table->date('tanggal');
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
    Schema::dropIfExists('barang_keluar');
  }
};
