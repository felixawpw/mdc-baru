<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignPemakaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pemakaians', function (Blueprint $table) {
            $table->integer('dokter_id')->unsigned();
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');

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
        Schema::table('pemakaians', function (Blueprint $table) { 
            $table->dropForeign(['dokter_id']);
            $table->dropColumn('dokter_id');
        });
        Schema::table('pemakaians', function (Blueprint $table) { 
            $table->dropForeign(['barang_id']);
            $table->dropColumn('barang_id');
        });
    }
}
