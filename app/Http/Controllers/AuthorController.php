<?php

namespace App\Http\Controllers;

use App\Approver;
use App\FormCreation;
use App\Notifications\filenotif;
use App\Notifications\ForApproval;
use Illuminate\Http\Request;
use App\Form;
use App\Editable_file;
use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class AuthorController extends Controller
{
    public function index() //Change Request Form View
    {
        return view('qms.change_request_form');
    }

    public function crl_view() // To view all request form in author's view.
    {
        $qms = Form::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('qms.change_request_list', compact('qms'));
    }

    public function crf_request(Request $request)
    {
        $request->validate([
            'doctitle' => 'required',
            'version' => 'required',
            'effectdate' => 'required',
            'classification' => 'required',
            'natureofR' => 'required',
            'docparts' => 'required',
            'NversionN' => 'required',
            'NeffectiveD' => 'required'
        ]);

        $resquest_crf = new Form();
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
        $resquest_crf->form_nature_request = $request->natureofR;
        $resquest_crf->form_classification = $request->classification;
        $resquest_crf->form_new_effective_date = $request->NeffectiveD;
        $resquest_crf->form_parts = $request->docparts;
        $resquest_crf->file_version = '0';
        $resquest_crf->save();
        auth()->user()->notify(new filenotif());
        return redirect('change_request_list')->with('Success', 'Your document was successfully submitted');

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

            //update Form status to 3 that represent as submitted file
            $forms = Form::find($form_id);
            $forms->form_status = '3';
            $forms->save();

            return redirect('qms_author')->with('Success', 'Your document was successfully submitted');
            auth()->user()->notify(new filenotif());
        }
    }

    public function editable_files() // editable files view
    {
        $editable_files = Editable_file::with(['sender', 'file'])
            ->orderBy('id', 'DESC')
            ->get();
        return view('qms.editable_files', compact('editable_files'));
    }

    public function qms_author() // CRF List View
    {
        $s_qms_file = File::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('qms.qms_author', compact('s_qms_file'));
    }

    public function form_view($id)
    {
        $v_files = Form::findOrFail($id);
        $form_file = File::where('form_id', '=', $id, 'AND', 'file_status', '=', '2')
            ->first();
        return view('qms.form_view', compact('v_files', 'form_file'));
    }

    public function form_view2($id)
    {
        $v_files = Form::findOrFail($id);
        $form_file = File::where('form_id', '=', $id, 'AND', 'file_status', '=', '2')->first();
        $file_history = File::where('form_id', '=', $id)->get();
        return view('qms.form_view2', compact('v_files', 'form_file', 'file_history'));
    }
    public function doctitle() {
        $doctitle = Form::select('form_doc_title')->get();
            return $doctitle;
            return view ('qms.change_request_list',compact('doctitle'));
    }
}



/*  After submitting the form to the file holder. the author will wait for the editable file.
 *  The form will show on the change request list tab. with title, date submit, status(process_status) and action.
 *  Action column will have view button and submit file button.
 *  -view button will show the CRF information and the all the file version
 *  -submit file is the submit the updated file version
 *
 */
