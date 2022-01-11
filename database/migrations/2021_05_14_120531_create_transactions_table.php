<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id');
            $table->string('total_harga');
            $table->string('kurir', 30);
            $table->string('alamat');
            $table->string('metode_pembayaran', 40)->default("belum dipilih");
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status')->default('belum memilih pembayaran');
            $table->date('maksimal_tanggal_pembayaran');
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
        Schema::dropIfExists('transactions');
    }
}
