<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftclientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softclients', function (Blueprint $table) {
            $table->id('id_sclient');
            $table->text('r_sclient');
            $table->text('d_sclient');
            $table->text('c_client');
            $table->text('n_sclient');
            $table->text('i_cstatus');
            $table->text('pp_sclient');
            $table->text('sc_programmer');
            $table->text('sc_itsupport');
            $table->date('tgl_ssoftclient');
            $table->text('i_cprog');
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
        Schema::dropIfExists('softclients');
    }
}
