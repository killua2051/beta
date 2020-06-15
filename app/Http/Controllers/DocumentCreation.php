<?php

namespace App\Http\Controllers;

use App\Form;
use App\creation;
use App\FormCreation;
use App\Notifications\filenotif;
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
        return view('creation.creation_request_form');
    }
    public function creation_request(Request $request)
    {
        $request->validate([
            'doctitle' => 'required',
            'version' => 'required',
            'effectdate' => 'required',
            'classification' => 'required',
            'docparts' => 'required',
            'NversionN' => 'required',
            'NeffectiveD' => 'required'
        ]);

        $resquest_crf = new FormCreation();
        $resquest_crf->user_id = $request->user; //temporary files
        $resquest_crf->approver_id = '0';
        $resquest_crf->reviewer_id = '0';
        $resquest_crf->crf_number_id = '0'; //temporary files
        $resquest_crf->form_status = '1';
        $resquest_crf->form_doc_code = '0'; //temporary files
        $resquest_crf->form_doc_title = $request->doctitle;
        $resquest_crf->form_version_number = $request->version;
        $resquest_crf->form_new_version = $request->NversionN;
        $resquest_crf->form_effective_date = $request->effectdate;
        $resquest_crf->form_classification = $request->classification;
        $resquest_crf->form_new_effective_date = $request->NeffectiveD;
        $resquest_crf->form_parts = $request->docparts;
        $resquest_crf->file_version = '0';
        $resquest_crf->save();
        auth()->user()->notify(new filenotif());
        return redirect('change_request_list')->with('Success', 'Your document was successfully submitted');

    }
}
