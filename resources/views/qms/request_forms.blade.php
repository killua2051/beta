@if(!isset(Auth::user()->email))
    <script>window.location = "index";</script>
@endif

@extends('admin_template')

@section('content')
    <!-- /.col -->

        @if($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
        @elseif($message = Session::get('Success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Change Request List</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table id="request_forms" class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th style="width: 145px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_forms as $no=>$all_forms)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $all_forms->form_doc_title }}</td>
                                <td>{{ $all_forms->author->first_name }}</td>
                                <td>{{ date('F d, Y', strtotime($all_forms->created_at)) }}</td>
                                <td>{{ $all_forms->formStatus->name }}</td>
                                <td>
                                    <a target="_blank" href="{{ URL::to('form_view2/'.$all_forms->id) }}" class="btn btn-primary" style="display: inline-block;">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    <div class="modal fade" id="modal-newfile">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Submit Qms Files</h4>
                </div>
                <form action="{{ url('file_submit')}}" method="POST" name="fileupload" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="form_id" id="form_id" value="">
                        <input type="hidden" name="form_doc_title" id="form_doc_title" value="">
                        <input type="file" class="form-control" name="upload" required="required">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@endsection