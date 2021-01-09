<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDnewsoftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnewsofts', function (Blueprint $table) {
            $table->id('id_nsoft');
            $table->text('no_nsoft');
            $table->text('d_nsoft');
            $table->text('n_fitur');
            $table->text('i_nsstatus');
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
        Schema::dropIfExists('dnewsofts');
    }
}
