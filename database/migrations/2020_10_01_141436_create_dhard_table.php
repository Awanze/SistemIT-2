<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhard', function (Blueprint $table) {
            $table->id('id_hard');
            $table->text('no_hard');
            $table->text('dm_hard');
            $table->text('k_rusak');
            $table->text('i_status');
            $table->text('i_prog');
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
        Schema::dropIfExists('dhard');
    }
}
