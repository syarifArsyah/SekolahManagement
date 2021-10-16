<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToTableSiswas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('NIS');
            $table->string('nama');
            $table->string('tpt_lahir');
            $table->date('tgl_lahir');
            $table->enum('jk', ['L', 'P']);
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu', 'budha']);
            $table->text('alamat');
            $table->unsignedBigInteger('id_jurusan');
            $table->string('asal_sekolah');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            //
        });
    }
}
