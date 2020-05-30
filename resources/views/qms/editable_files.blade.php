@if(!isset(Auth::user()->email))
 <script>window.location = "index";</script>
@endif

@extends('admin_template')

@section('content')
<!-- /.col -->
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Editable Files</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="editablefiles" class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Sent by</th>
                    <th>Date</th>
                    <th style="width: 145px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $editable_files as $no=>$E_file )
                      <tr>
                      <td>{{ ++$no }}</td>
                      <td>{{ $E_file->file->file_title }}</td>
                      <td>{{ $E_file->sender->first_name }}</td>
                      <td>{{ date('F d, Y', strtotime($E_file->created_at)) }}</td>
                      <td>
                        <a class="btn btn-primary" style="display: inline-block;" href="files/{{ $E_file->file->file_path }}" download="files/{{ $E_file->file->file_path }}">Download</a>
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
<!-- jquery.min -->
<script src="{{ asset ("/bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- jQuery 2.1.3 -->

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- DataTables -->
<script src="{{ asset ("/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset ("/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>

<!-- SlimScroll -->
<script src="{{ asset ("/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset ("/bower_components/fastclick/lib/fastclick.js") }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>

<script>
  $(function () {
    $('#editablefiles').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection