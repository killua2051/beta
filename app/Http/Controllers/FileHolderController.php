<?php

namespace App\Http\Controllers;

use App\Editable_file;
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
        /*if($request->hasFile('upload')){
            $file = $request->file('upload');
            $file_size = $file->getClientSize();
            $file_ext = $file->getClientOriginalExtension();
            $file_name = $file->getClientOriginalName();
            //$file_name = rand(123456, 999999).".".$file_ext; //this is to change file name
            $destination_path = public_path('files');
            $file->move($destination_path,$file_name);

            $crf_approve = Form::find($request->form_id);
            $crf_approve->form_status = '1';
            $crf_approve->save();

            $crf_efiles = new Editable_file([
                'form_id' => $request->form_id,
                'user_id' => $request->author_id,
                'file_id' => $request->select_file, //this file will get from files table
                'file_holder_id' => Auth::user()->id
            ]);

            $crf_efiles->save();

            return redirect('request_list')->with('Success', 'Change Request Approved');
        }*/

        $crf_approve = Form::find($request->form_id);
        $crf_approve->form_status = '2';
        $crf_approve->save();

        $crf_efiles = new Editable_file([
            'form_id' => $request->form_id,
            'user_id' => $request->author_id,
            'file_id' => $request->select_file,
            'file_holder_id' => Auth::user()->id
        ]);
        $crf_efiles->save();

        return redirect('request_list')->with('Success', 'Change Request has been approved');

    }

    public function crf_declined(Request $request)
    {
        $crf_declined = Form::find($request->form_id); ///ask if requesting for revision can be denied?
        $crf_declined->form_status = '8';
        $crf_declined->save();

        return redirect('request_list')->with('Success', 'Change Request has been declined');
    }


}
