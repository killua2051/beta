@if(!isset(Auth::user()->email))
    <script>window.location = "index";</script>
@endif

@extends('admin_template')

@section('content')
    <!-- /.col -->
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">QMS Files</h3>

                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body no-padding">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date Created</th>
                        <th>Date Approve</th>
                        <th>Date Review</th>
                        <th>Status</th>
                        <th style="width: 145px">Action</th>
                    </tr>
                    </thead>
                    @foreach ($review_file as $no=>$qm)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $qm->file_title }}</td>
                            <td>{{ $qm->sender->first_name }}</td>
                            <td>{{ date('Y-m-d', strtotime($qm->created_at)) }}</td>
                            <td>{{ date('Y-m-d', strtotime($qm->approved_date)) }}</td>
                            <td>{{ $qm->reviewed_date }}</td>
                            <td>{{ $qm->fileStatus->name }}</td>
                            <td>
                                <a target="_blank" href="files/{{ $qm->file_path }}" class=" btn btn-primary fa fa-eye"></a>
                                <button class=" btn btn-success fa fa-check" data-toggle="modal" data-target="#modal-b-approve" data-formid="{{ $qm->form_id }}" data-fileid="{{ $qm->id }}"
                                         @if($qm->file_status > 4) disabled='disabled' @endif></button>
                                <button class=" btn btn-warning fa fa-times" data-toggle="modal" data-target="#modal-b-decline" data-formid="{{ $qm->form_id }}" data-fileid="{{ $qm->id }}"
                                         @if($qm->file_status > 4) disabled='disabled' @endif></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="modal fade" id="modal-b-approve">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Approved Files</h4>
                </div>
                <form action="{{ url('qa_approved') }}" method="POST" name="fileupload" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="form_id" id="form_id" value="">
                        <input type="hidden" name="file_id" id="file_id" value="">
                        <p class="text-warning" >Are you sure you want to approved this file?</p>
                        <span>CRF Number</span>
                        <input type="text" class="form-control" name="crfNumber" id="crfNumber" value="" required>
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
                <form action="{{ url('qa_revision') }}" method="POST">
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