<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    public function reviewer()
    {
        return $this->belongsTo('\App\User','user_id', 'id');
    }
}
