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
              <h3 class="box-title">QMS Files</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="qmsfiles" class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th style="width: 145px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($s_qms_file as $no=>$qm)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $qm->file_title }}</td>
                    <td>{{ date('F d, Y', strtotime($qm->created_at)) }}</td>
                    <td>{{ $qm->fileStatus->description }}</td>
                    <td>
                      <a target="_blank" class="btn btn-primary" style="display: inline-block;" href="files/{{ $qm->file_path }}" >Download</a>
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

@endsection