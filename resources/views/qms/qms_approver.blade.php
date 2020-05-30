@if(!isset(Auth::user()->email))
    <script>window.location = "index";</script>
@endif

@extends('admin_template')

@section('content')
    <!-- /.col -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Files for Review</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <table id="qmsfiles" class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date Submitted</th>
                            <th>Date Approved</th>
                            <th>Status</th>
                            <th style="width: 145px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($s_file as $no=>$qm)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $qm->file_title }}</td>
                            <td>{{ $qm->sender->first_name }}</td>
                            <td>{{ date('F d, Y', strtotime($qm->created_at)) }}</td>
                            <td>{{ date('F d, Y', strtotime($qm->approved_date)) }}</td>
                            <td>{{ $qm->fileStatus->name }}</td>
                            <td>
                                <a target="_blank" class=" btn btn-primary fa fa-eye" style="display: inline-block;" href="files/{{ $qm->file_path }}" ></a>
                                <button class=" btn btn-success fa fa-check" data-toggle="modal" data-target="#modal-b-approve" data-formid="{{ $qm->form_id }}" data-fileid="{{ $qm->id }}"
                                        style="display: inline-block;" @if($qm->file_status > 3) disabled='disabled' @endif  >
                                </button>
                                <button class=" btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#modal-b-decline" data-formid="{{ $qm->form_id }}" data-fileid="{{ $qm->id }}"
                                        style="display: inline-block;" @if($qm->file_status > 3) disabled='disabled' @endif  >
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    <div class="modal fade" id="modal-b-approve">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Approve Files</h4>
                </div>
                <form action="{{ url('qms_approved') }}" method="POST" name="fileupload" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="form_id" id="form_id" value="">
                        <input type="hidden" name="file_id" id="file_id" value="">
                        <p class="text-warning" >Are you sure you want to approve this file?<br> This will automatically be sent to Quality Assurance to check the content and formats.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="modal-b-decline">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">For Revision Files</h4>
                </div>
                <form action="{{ url('qms_revision') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="form_id" id="form_id" value="">
                        <input type="hidden" name="file_id" id="file_id" value="">
                        <p class="text-warning" >Are you sure you want to mark this file as "for revision"? This file will return to the author for revision.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@endsection


