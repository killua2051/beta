<?php

namespace App\Http\Controllers;


use App\FormCreation;
use App\Notifications\filenotif;
use App\Notifications\ForApproval;
use App\User;
use Illuminate\Http\Request;
use App\Form;
use App\Editable_file;
use App\File;
use Illuminate\Support\Facades\Auth;

class ApproverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function qmclss_approver() // CRF List View
    {
        $s_file = File::select('files.id','files.form_id','files.user_id','files.file_title',
                            'files.file_status','files.created_at','files.updated_at','users.first_name',
                            'files.approver_id','files.reviewer_id','files.approved_date','files.reviewed_date',
                            'files.file_path','users.middle_name','users.last_name','departments.departments_name')
            ->leftJoin('users', 'files.user_id', '=', 'users.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->where('department_id', '=', Auth::user()->department_id)
            ->orderBy('files.id', 'DESC')
            ->get();

        return view('qms.qms_approver', compact('s_file'));
    }

    public function qms_approved(Request $request)
    {
        $s_file = File::find($request->file_id);
        $s_file->file_status = '4';
        $s_file->approver_id = '1';
        $s_file->save();

        $form = FormCreation::find($request->form_id);
        $form->form_status = '4';
        $form->approver_id = '1';
        $form->save();

        auth()->user()->notify(new filenotif());
        return redirect('qms_approver')->with('Success', 'Document is now for review');
    }

    public function qms_revision(Request $request)
    {
        /* The form will be mark as for revision so the form_status will become 1
         *
         * */
        $form = Form::find($request->form_id);
        $form->form_status = '1';
        $form->file_version = $form->file_version++;
        $form->approver_id = Auth::user()->id;
        $form->save();

        /* This file will be mark as rejected. so the file status will become 4
         *
         * */
        $crf_declined = File::find($request->file_id);
        $crf_declined->file_status = '6';
        $crf_declined->approved_date = date('Y-m-d H:i:s');
        $crf_declined->save();

        return redirect('qms_approver')->with('Success', 'File is for revision');
    }

    public function request_forms()
    {
        // $all_forms = Form::all();
        $all_forms = Form::select('forms.id', 'forms.user_id', 'forms.approver_id', 'forms.reviewer_id', 'forms.crf_number_id', 'forms.form_status', 'forms.form_doc_code', 'forms.form_doc_title',
                    'forms.form_version_number','forms.form_new_version','forms.form_effective_date','forms.form_nature_request','forms.form_classification','forms.form_new_effective_date',
                    'forms.form_parts','forms.file_version','forms.created_at','forms.updated_at')
            ->leftJoin('users', 'forms.user_id', '=', 'users.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->where('department_id', '=', Auth::user()->department_id)
            ->orderBy('forms.id', 'DESC')
            ->get();

        return view('qms.request_forms', compact('all_forms'));
    }


}

/*
 * Plan:
 * It will show all the CRF with button view(eye), approved(check) and for revision(pencil)
 * view(eye) button will show all CRF information with the versions of documents.
 * approved(check) and for revision(pencil) button will marked as approved and for revision
 *
 */
