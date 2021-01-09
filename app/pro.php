<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pro extends Model
{
    protected $table = 'pro';
    protected $primaryKey = 'id_pro';
    protected $fillable = ['id_pro','nama_pro','tgl_lahir_pro','nohp_pro','email_pro','alamat_pro'];
}
