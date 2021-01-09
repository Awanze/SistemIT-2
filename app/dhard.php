<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dhard extends Model
{
    //
    protected $table = 'dhard';
    protected $fillable = ['id','id_hard','no_hard','dm_hard','k_rusak','i_status','i_prog'];

}
