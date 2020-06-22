<?php

namespace App\Http\Controllers;


use App\Form;
use App\File;
use App\Notifications\filenotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileHolderController extends Controller
{
    public function request_list_view() // To view all request form for Editable file.
    {
        $qms = Form::with('author')
                    ->orderBy('id', 'DESC')->get();

        $select_files = File::select('*')
                        ->where('file_status', '=', '3')
                        ->get();

        return view('qms.request_list', compact('qms', 'select_files'));
    }


    public function qms_files() //To view all approved and reviewed files
    {
        $s_qms_file = File::select('*')
                    ->where('file_status', '=', '3')
                    ->get();
        return view('qms.qms_files', compact('s_qms_file'));
    }

    public function crf_approved(Request $request)
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
            $qms_files->file_title = $file_name;
            $qms_files->file_path = $file_name;
            $qms_files->file_status = '2';
            $qms_files->save();

            //update Form status to 3 that represent as submitted file
            $forms = Form::find($form_id);
            $forms->form_status = '2';
            $forms->save();

            return redirect('request_list')->with('Success', 'You have submitted the editable file.');
            auth()->user()->notify(new filenotif());
        }
    }

            
                
    public function crf_declined(Request $request)
    {
        $crf_declined = Form::find($request->form_id); ///ask if requesting for revision can be denied?
        $crf_declined->form_status = '8';
        $crf_declined->save();

        return redirect('request_list')->with('Success', 'Change Request has been declined');
    }


}
