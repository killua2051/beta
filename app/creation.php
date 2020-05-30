<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class creation extends Model
{
    public function sender()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function fileStatus()
    {
        return $this->belongsTo('App\FileStatus', 'file_status');
    }
}
