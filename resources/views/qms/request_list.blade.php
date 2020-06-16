@if(!isset(Auth::user()->email))
 <script>window.location = "index";</script>
@endif

@extends('admin_template')

@section('content')
<!-- /.col -->
        <div class="col-md-12">

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
              <table id="FHrequestList" class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th style="width: 145px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($qms as $no=>$crl)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $crl->form_doc_title }}</td>
                    <td>{{ $crl->author->first_name }}</td>
                    <td>{{ $crl->author->userDepartment->departments_name }}</td>
                    <td>{{ date('F d, Y', strtotime($crl->created_at)) }}</td>
                    <td>{{ $crl->formStatus->name }}</td>
                    <td>
                      <a target="_blank" href="{{ URL::to('form_view/'.$crl->id) }}" class=" btn btn-primary fa fa-eye"></a>
                      <button class=" btn btn-success fa fa-check" data-toggle="modal" data-target="#modal-approve" data-formid="{{ $crl->id }}" data-authorid="{{ $crl->author->id }}"
                              style="display: inline-block;" @if($crl->form_status > 4) disabled='disabled' @endif >
                      </button>
                      <button class=" btn btn-warning fa fa-times" data-toggle="modal" data-target="#modal-decline" data-formid="{{ $crl->id }}" data-authorid="{{ $crl->author->id }}"
                              style="display: inline-block;" @if($crl->form_status > 4) disabled='disabled' @endif >
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
      </div>

<!--My comment dito -->
<div class="modal fade" id="modal-approve">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Approve Request</h4>
        </div>
        <form action="{{ url('crf_approved/') }}" method="POST" name="fileupload" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="form_id" id="form_id" value="">
            <input type="hidden" name="author_id" id="author_id" value="">
            <p class="text-warning" >In order to approve the request. you have to send the "editable file".</p>
            {{--<input type="file" class="form-control" name="upload" required="required">--}}
              <div class="form-group">
                <label>Select File</label>
                <input type="text" class="form-control" placeholder="Search Title" disabled>
                <select class="form-control" name="select_file" id="select_file">
                  @foreach($select_files as $select_files)
                    <option value="{{ $select_files->id }} ">{{ $select_files->file_title }}</option>
                  @endforeach
                </select>
              </div>

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

<!--My comment din dito -->
<div class="modal fade" id="modal-decline">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Declined Request</h4>
        </div>
        <form action="{{ url('crf_declined/') }}" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="form_id" id="form_id" value="">
            <input type="hidden" name="author_id" id="author_id" value="">
            <h4 class="text-warning" >Are you sure you want to decline this request?</h4>
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
