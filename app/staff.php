<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    protected $fillable = ['id_staff','nama_staff','nohp_staff','email_staff','user_staff','pass_staff','dep_staff'];

    protected $hidden = ['pass_staff'];

}


