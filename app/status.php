<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $fillable = ['id_status','nama_status'];
}
