<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDnetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnetworks', function (Blueprint $table) {
            $table->id();
            $table->text('no_net');
            $table->text('d_net');
            $table->text('j_pemasangan');
            $table->text('i_nstatus');
            $table->text('i_nprog');
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
        Schema::dropIfExists('dnetworks');
    }
}
