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

<div class="container"><br><br>
<div class="col-lg-10 col-lg-offset-1" style="background-color: #FFFF; box-shadow: 0px 1px 2px 0.5px #0a0a0a">
<br>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif 
<center>
	<img src="{{ asset("/bower_components/admin-lte/dist/img/APC Seal_1500.png") }}" width="100" height="100">
	<br><p class="ct_text">ASIA PACIFIC COLLEGE</p>
	<br>
	<h4><b class="ct_text">Change Request Form</b></h4>
	<br><br> 
</center>

<table class="table table-bordered" width="100%" border="1">
	<tr class="first_row">
		<td class="elem" width="20%"><b>CRF Number:</b> {{ $v_files->crf_number_id }}</td>
		<td class="elem" width="50%"><b>Date Received:</b>@if($form_file == !null && $form_file->reviewed_date != '0000-00-00 00:00:00') {{  date('F d, Y', strtotime($form_file->reviewed_date))  }} @endif </td>
		<td class="elem" width="30%"><b>Received By:</b> {{ $v_files->approver_id }} </td>
	</tr>
</table>

<br>
<table class="table table-bordered" width="100%" border="1" >
	<tr class="first_row">
		<td class="elem" width="20%"><b>Document Code:</b></td>
		<td class="elem" colspan="3" width="80%"> {{ $v_files->form_doc_code }} </td>
	</tr>
	<tr class="first_row">
		<td class="elem" width="20%"><b>Document Title:</b></td>
		<td class="elem" colspan="3" width="80%"> {{ $v_files->form_doc_title }} </td>
	</tr>
	<tr class="first_row">
		<td class="elem" width="20%"><b>Version Number:</b></td>
		<td class="elem" width="30%">{{ $v_files->form_version_number }}</td>
		<td class="elem" width="20%"><b>Effective Date:</b></td>
		<td class="elem" width="30%">{{ $v_files->form_effective_date }}</td>
	</tr>
	<tr class="first_row">
		<td class="elem" width="20%"><b>Classification:</b></td>
		<td class="elem" width="80%" colspan="3">{{ $v_files->form_classification }}</td>
	</tr>
	<tr class="first_row">
		<td class="elem" width="20%"><b>Nature of Request:</b></td>
		<td class="elem" width="80%" colspan="3">{{ $v_files->form_nature_request }}</td>
	</tr>
	<tr class="first_row">
		<td colspan="4" height="300" class="elem">
			<p style="/*margin-top: -145px; */">{{ $v_files->form_parts }}</p>
		</td>
	</tr>
	<tr class="first_row">
		<td class="elem" width="20%"><b>New Version Number:</b></td>
		<td class="elem" width="30%">{{ $v_files->form_new_version }}</td>
		<td class="elem" width="20%"><b>Effective Date:</b></td>
		<td class="elem" width="30%">{{ date('F d, Y', strtotime($v_files->form_new_effective_date)) }}</td>
	</tr>
</table>
<br>
<table class="table table-bordered" width="100%" border="1">
	<tr class="first_row">
		<td class="elem" width="15%"><b>Prepared by:</b></td>
		<td class="elem" width="20%">{{ $v_files->author->first_name }}</td>
		<td class="elem" width="15%"><b>Reviewed by:</b></td>
		<td class="elem" width="20%">@if($v_files->reviewBy == !null){{ $v_files->reviewBy->reviewer->first_name }} @endif</td>
		<td class="elem" width="15%"><b>Approved by:</b></td>
		<td class="elem" width="15%">@if($v_files->approveBy == !null){{ $v_files->approveBy->approver->first_name }} @endif</td>
	</tr>
	<tr class="first_row">
		<td class="elem" width="15%"><b>Date:</b></td>
		<td class="elem" width="20%">{{ date('F d, Y', strtotime($v_files->created_at)) }}</td>
		<td class="elem" width="15%"><b>Date:</b></td>
		<td class="elem" width="20%">@if($form_file == !null && $form_file->reviewed_date != '0000-00-00 00:00:00') {{  date('F d, Y', strtotime($form_file->reviewed_date))  }} @endif</td>
		<td class="elem" width="15%"><b>Date:</b></td>
		<td class="elem" width="15%">@if($form_file == !null && $form_file->approved_date != '0000-00-00 00:00:00') {{  date('F d, Y', strtotime($form_file->approved_date))  }} @endif</td>
	</tr>
</table>

<br><br>
<!-- <input type="button" href="crl" class="btn btn-warning" name="back" value="Back"> -->
<!-- <a href="{{ URL::to('crl') }}" class="btn btn-warning">Back</a> -->
<br><br>

</div>
<br>&nbsp;<br>

</div>
<br><br>






