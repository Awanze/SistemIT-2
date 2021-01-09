<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dsoftclients extends Model
{
    //
    protected $table = 'dsoftclients';
    protected $fillable = ['id','id_sclient','no_dsclient','d_sclient','c_fitur','i_cstatus','i_cprog'];

}
