<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->id('id_net');
            $table->text('r_net');
            $table->text('d_net');
            $table->text('i_company');
            $table->text('i_Leader');
            $table->text('i_nstatus');
            $table->text('i_nprog');
            $table->text('j_pemasangan');
            $table->text('k_digunakan');
            $table->date('tgl_mpemasangan');
            $table->date('tgl_apemasangan');
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
        Schema::dropIfExists('networks');
    }
}
