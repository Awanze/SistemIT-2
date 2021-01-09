<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsoftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsofts', function (Blueprint $table) {
            $table->id('id_nsoft');
            $table->text('r_nsoft');
            $table->text('d_nsoft');
            $table->text('n_soft');
            $table->text('j_soft');
            $table->text('i_nsstatus');
            $table->text('pp_soft');
            $table->text('nsoft_programmer');
            $table->text('nsoft_itsupport');
            $table->date('tgl_ssoft');
            $table->text('i_nsprog');
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
        Schema::dropIfExists('newsofts');
    }
}
