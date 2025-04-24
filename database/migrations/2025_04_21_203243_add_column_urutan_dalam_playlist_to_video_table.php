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
        Schema::table('vidio', function (Blueprint $table) {
            $table->integer('urutan_dalam_playlist')->after('nama_vidio');
            $table->integer('durasi')->after('urutan_dalam_playlist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vidio', function (Blueprint $table) {
            $table->dropColumn('urutan_dalam_playlist');
            $table->dropColumn('durasi');
        });
    }
};
