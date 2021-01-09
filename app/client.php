<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id_client';
    protected $fillable = ['id_client','nama_client','nohp_client','email_client','alamat_client','maintenance','jumlah_server','jumlah_lisensi','jumlah_komputer'];
}
