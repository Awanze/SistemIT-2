<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dnetworks extends Model
{
    //
    protected $table = 'dnetworks';
    protected $fillable = ['id','id_net','no_net','d_net','j_pemasangan','i_nstatus','i_nprog'];
}
