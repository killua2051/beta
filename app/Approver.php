<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    public function approver()
    {
        return $this->belongsTo('\App\User','user_id', 'id');
    }
}
