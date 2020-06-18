<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{


    public function author()
    {
        return $this->belongsTo('\App\User','user_id', 'id');
    }

    public function IsFile()
    {
        return $this->belongsTo('\App\File', 'file_id', 'id');
    }

    public function userDepartment()
    {
        return $this->belongsTo('\App\Department', 'department_id', 'id');
    }

    public function formStatus()
    {
        return $this->belongsTo('App\FileStatus', 'form_status');
    }

    public function approveBy()
    {
        return $this->belongsTo('App\Approver', 'approver_id');
    }

    public function reviewBy()
    {
        return $this->belongsTo('App\Reviewer', 'reviewer_id');
    }


}
