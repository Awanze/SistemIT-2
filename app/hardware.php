<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hardware extends Model
{
    //
    protected $table = 'hardware';
    protected $fillable = ['id_hard','m_hard','i_client','i_staff','tgl_perbaikan','h_its'];
    protected $primaryKey = 'id_hard';
}
