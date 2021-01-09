<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsoft extends Model
{
    //
    protected $table = 'newsofts';
    protected $fillable = ['id_nsoft','r_nsoft','n_soft','j_soft','pp_soft','nsoft_progremmer','nsoft_itsupport','tgl_ssoft'];
    protected $primaryKey = 'id_nsoft';

}

