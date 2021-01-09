<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class network extends Model
{
    //
    protected $table = 'networks';
    protected $fillable = ['id_net','r_net','d_net','i_company','i_Leader','tgl_mpemasangan','tgl_apemasangan'];
    protected $primaryKey = 'id_net';

}
