<?php

namespace App\Http\Controllers;

use App\Form;
use App\creation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentCreation extends Controller
{
    public function crl_view() // To view all request form in author's view.
    {
        $creation =Form::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('creation.document_creation', compact('creation'));
    }

    public function creationlist() // To view all request form in author's view.
    {
        $creation = Form::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('creation.creation_list', compact('creation'));
    }
    public function index() //Change Request Form View
    {
        return view('creation.creation_form');
    }
}
