<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class softclient extends Model
{
    //
    protected $table = 'softclients';
    protected $fillable = ['id_sclient','r_sclient','c_fitur','c_client ','n_sclient','pp_sclient','sc_programmer','sc_itsupport','tgl_ssoftclient'];
    protected $primaryKey = 'id_sclient';

}
