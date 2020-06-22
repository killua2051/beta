<?php

namespace App\Http\Controllers;

use App\Form;
use App\File;
use App\FormCreation;
use App\Notifications\filenotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentCreation extends Controller
{
    public function crl_view() // To view all request form in author's view.
    {
        $creation = Form::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('creation.document_creation', compact('creation'));
    }

    public function creationlist() // To view all request form in author's view.
    {
        $creation = FormCreation::where('user_id', '=', Auth::user()->id)
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
        $resquest_crf->form_effective_date = $request->effectdate;
        $resquest_crf->form_classification = $request->classification;
        $resquest_crf->form_parts = $request->docparts;
        $resquest_crf->save();
        auth()->user()->notify(new filenotif());
        return redirect('creation_list')->with('Success', 'Your document was successfully submitted');

    }

    public function creation_form_view($id)
    {
        $v_files = FormCreation::findOrFail($id);
        $form_file = File::where('form_id', '=', $id, 'AND', 'file_status', '=', '2')->first();
        $file_history = File::where('form_id', '=', $id)->get();
        return view('creation.creation_form_view', compact('v_files', 'form_file', 'file_history'));
    }

    public function file_submit(Request $request)
    {
        $form_id = $request->get('form_id');
        $form_doc_title = $request->get('form_doc_title');

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $file_size = $file->getClientSize();
            $file_ext = $file->getClientOriginalExtension();
            //$file_name = $file->getClientOriginalName();
            $file_name = rand(123456, 999999) . "." . $file_ext; //this is to change file name
            $destination_path = public_path('files');
            $file->move($destination_path, $file_name);

            //save data to submit file
            $qms_files = new File();
            $qms_files->form_id = $form_id;
            $qms_files->user_id = Auth::user()->id;
            $qms_files->reviewer_id = '0'; //temporary value
            $qms_files->approver_id = '0'; //temporary value
            $qms_files->approved_date = now(); //temporary value
            $qms_files->reviewed_date = now(); //temporary value
            $qms_files->file_title = $form_doc_title;
            $qms_files->file_path = $file_name;
            $qms_files->file_status = '3';
            $qms_files->save();

           

            return redirect('creation_list')->with('Success', 'Your document was successfully submitted');
            auth()->user()->notify(new filenotif());
        }
    }
}
