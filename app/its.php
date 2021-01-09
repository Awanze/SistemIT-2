<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class its extends Model
{
    protected $table = 'its';
    protected $primaryKey = 'id_its';
    protected $fillable = ['id_its','nama_its','tgl_lahir_its','nohp_its','email_its','alamat_its'];
}

