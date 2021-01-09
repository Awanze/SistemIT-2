<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class progress extends Model
{
    //
    protected $table = 'progress';
    protected $primaryKey = 'id_progress';
    protected $fillable = ['id_progress','nama_progress'];
}
?>