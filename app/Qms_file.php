<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qms_file extends Model
{
    protected $primaryKey = 'qms_id';
    protected $fillable = [
    	'qms_id',
    	'forms_id',
        'qms_author',
        'qms_approver',
        'qms_reviewer',
    	'qms_title',
        'qms_location',
        'created_at'
    ];
}
