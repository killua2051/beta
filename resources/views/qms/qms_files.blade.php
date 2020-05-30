@if(!isset(Auth::user()->email))
 <script>window.location = "index";</script>
@endif

@extends('admin_template')

@section('content')
<!-- /.col -->
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">QMS Files</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="FHqmsfiles" class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date Reviewed</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($s_qms_file as $no=>$qm)
                    <tr>
                      <td>{{ ++$no }}</td>
                      <td>{{ $qm->file_title }}</td>
                      <td>{{--{{ $qm->author->first_name }}--}}</td>
                      <td>{{ date('F d, Y', strtotime($qm->reviewed_date)) }}</td>
                      <td>
                        <a target="_blank" class="btn btn-primary" style="display: inline-block;" href="qms_files/{{ $qm->file_title }}">View</a>

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