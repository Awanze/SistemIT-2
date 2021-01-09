<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dnewsofts extends Model
{
    //
    protected $table = 'dnewsofts';
    protected $fillable = ['id','id_nsoft','no_nsoft','d_nsoft','n_fitur','i_nsstatus','i_nsprog'];
}
