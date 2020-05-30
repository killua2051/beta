<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Editable_file extends Model
{

    protected $fillable = [
    	'file_id',
		'form_id',
		'file_holder_id',
		'user_id',
    	'created_at'
    ];

    public function sender()
    {
        return $this->belongsTo('App\User', 'file_holder_id');
    }

    public function file()
    {
        return $this->belongsTo('\App\File', 'file_id', 'id');
    }

}
