@if(!isset(Auth::user()->email))
    <script>window.location = "index";</script>
@endif

<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "Document Creation and Revision" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" href="{{ asset("/bower_components/admin-lte/dist/img/apclogo.png") }}">
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
<!-- <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />  -->
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-yellow.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body class="skin-yellow">
{{--<div class="wrapper">--}}
<div class="col-md-10 col-md-offset-1 ">
<!-- header here -->

<br>
{{--<!-- sidebar here -->
@include('sidebar')--}}

    <div >
        <a href="{{url('change_request_list')}}"><img style="height: 50px; position: absolute" src="{{ asset("/bower_components/admin-lte/dist/img/apclogo.png") }}"/></a>
<h3 align="center">
    {{ "Procedure Manual" }}
    <small>{{ $page_description or null }}</small>
</h3>
    <br>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title text-bold">Document Information</h3>
            </div>

            <div class="box-body">
                <table class="table">
                    <tr>
                        <td><b><span> CRF Number:</span></b> {{ $v_files->crf_number_id }}</td>
                        <td><b><span> Date Received: </span></b>@if($form_file == !null && $form_file->reviewed_date != '0000-00-00 00:00:00') {{  date('F d, Y', strtotime($form_file->reviewed_date))  }} @endif</td>
                        <td><b><span>Received By: </span></b>@if($v_files->approveBy == !null){{ $v_files->approveBy->approver->first_name }} @endif</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b><span>Document Code:</span></b> {{ $v_files->form_doc_code }}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b><span>Document Title:</span></b> {{ $v_files->form_doc_title }}</td>
                    </tr>
                    <tr>
                        <td><b><span>Version Number:</span></b> {{ $v_files->form_version_number }}</td>
                        <td><b><span>Date of Effectivity:</span></b> {{ date('F d, Y', strtotime($v_files->form_effective_date)) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b><span>Classification:</span></b> {{ $v_files->form_classification }}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b><span>Nature of Request:</span></b> {{ $v_files->form_nature_request }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b><span>Parts to change : </span></b>
                            <br><textarea class="form-control" rows="4" disabled> {{ $v_files->form_parts }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><b><span>New Version Number: </span></b> {{ $v_files->form_new_version }}</td>
                        <td><b><span>Date of Effectivity : </span></b> {{ date('F d, Y', strtotime($v_files->form_new_effective_date)) }}</td>
                    </tr>
                    <tr>
                        <td><b><span>Prepared By: </span></b> {{ $v_files->author->first_name }}</td>
                        <td><b><span>Reviewed By : </span></b> @if($v_files->reviewBy == !null){{ $v_files->reviewBy->reviewer->first_name }} @endif</td>
                        <td><b><span>Approved By : </span></b> @if($v_files->approveBy == !null){{ $v_files->approveBy->approver->first_name }} @endif</td>
                    </tr>
                    <tr>
                        <td><b><span>Date:</span></b> {{ date('F d, Y', strtotime($v_files->created_at)) }}</td>
                        <td><b><span>Date:</span></b> @if($form_file == !null && $form_file->reviewed_date != '0000-00-00 00:00:00') {{  date('F d, Y', strtotime($form_file->reviewed_date))  }} @endif</td>
                        <td><b><span>Date:</span></b>@if($form_file == !null && $form_file->approved_date != '0000-00-00 00:00:00') {{  date('F d, Y', strtotime($form_file->approved_date))  }} @endif</td>
                    </tr>
                </table>
            </div>
        </div>
<br>
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title text-bold">File History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th>Document Title</th>
                        <th>Date Submitted</th>
                        <th>Document Status</th>
                        <th>Document Download</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($file_history as $file_history)
                        <tr>
                            <td>{{ $file_history->file_title }}</td>
                            <td>{{ $file_history->created_at }}</td>
                            <td>{{ $file_history->fileStatus->name }}</td>
                            <td><a target="_blank" class="btn btn-primary" style="display: inline-block;" href="../files/{{ $file_history->file_path }}" >Download Form</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr><td colspan="4"></td></tr>
                    </tfoot>
                </table>
            </div>
        </div>
            <!-- /.box-body -->
<br>
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title text-bold">Comments</h3>
            </div>
            <div class="box-body">
                <textarea class="form-control" rows="4" disabled> </textarea>
            </div>
        </div>
        </div>

        <!-- /.box -->
    </section>

<br>

<!-- Main Footer -->
<footer class="box-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Be a Ram
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2019 <a href="#">Asia Pacific College</a>.</strong> All rights reserved.
</footer>

</div>
</body>