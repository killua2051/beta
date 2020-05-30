<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Efile extends Model
{
    public function sender()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    public function file()
    {
        return $this->belongsTo('\App\File', 'file_id', 'id');
    }
}
