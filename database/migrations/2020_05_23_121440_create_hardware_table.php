<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware', function (Blueprint $table) {
            $table->id('id_hard');
            $table->text('m_hard');
            $table->text('dm_hard');
            $table->text('i_client');
            $table->text('i_staff');
            $table->text('i_status');
            $table->text('k_rusak');
            $table->text('k_ganti');
            $table->date('tgl_perbaikan');
            $table->text('i_prog');
            $table->text('h_staff');
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
        Schema::dropIfExists('hardware');
    }
}
