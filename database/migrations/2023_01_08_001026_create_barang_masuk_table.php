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
    Schema::create('barang_masuk', function (Blueprint $table) {
      $table->id();
      $table->foreignId('id_barang')->nullable()->constrained('barang')->nullOnDelete();
      $table->unsignedInteger('jumlah');
      $table->string('pengirim', 100);
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
    Schema::dropIfExists('barang_masuk');
  }
};
