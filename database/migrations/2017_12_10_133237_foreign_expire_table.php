<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignExpireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('expires', function (Blueprint $table) {
            $table->integer('penyimpanan_id')->unsigned();
            $table->foreign('penyimpanan_id')->references('id')->on('penyimpanans')->onDelete('cascade');

            $table->integer('barang_id')->unsigned();
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('expires', function (Blueprint $table) { 
            $table->dropForeign(['penyimpanan_id']);
            $table->dropColumn('penyimpanan_id');

            $table->dropForeign(['barang_id']);
            $table->dropColumn('barang_id');
        });
    }
}
