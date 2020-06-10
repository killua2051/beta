<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <title>{{ $page_title or "Document Creation" }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="icon" href="{{ asset("/bower_components/admin-lte/dist/img/apclogo.png") }}">
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />  -->  

        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset("/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

        <!-- Theme style -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-yellow.min.css")}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="sidebar-mini skin-yellow">
    <div class="wrapper">

    <!-- header here -->
        @include('header')

    <!-- sidebar here -->
        @include('sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    
                    <small>{{ $page_description or null }}</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                    @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->


    <!-- footer here -->
        @include('footer')

    </div><!-- ./wrapper -->
    
    <!-- REQUIRED JS SCRIPTS -->

    <!-- jquery.min -->
    <script src="{{ asset ("/bower_components/jquery/dist/jquery.min.js") }}"></script>
    <!-- jQuery 2.1.3 -->
    
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script> -->
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>

    <!-- DataTables -->
    <script src="{{ asset ("/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>

    <!-- SlimScroll -->
    <script src="{{ asset ("/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
    <!-- FastClick -->
    <script src="{{ asset ("/bower_components/fastclick/lib/fastclick.js") }}"></script>

<script type="text/javascript">
    $('#modal-approve').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var form_id = button.data('formid')
      var file_id = button.data('fileid')
      var author_id = button.data('authorid')
      var modal = $(this)

      modal.find('.modal-body #form_id').val(form_id);
      modal.find('.modal-body #file_id').val(file_id);
      modal.find('.modal-body #author_id').val(author_id);
    })

    $('#modal-decline').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var form_id = button.data('formid')
      var modal = $(this)

      modal.find('.modal-body #form_id').val(form_id);
    })

    $('#modal-newfile').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var form_id = button.data('formid')
      var form_doc_title = button.data('formdoctitle')
      var modal = $(this)

      modal.find('.modal-body #form_id').val(form_id);
      modal.find('.modal-body #form_doc_title').val(form_doc_title);
    })

    $('#modal-b-approve').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var form_id = button.data('formid')
        var file_id = button.data('fileid')
        var modal = $(this)

        modal.find('.modal-body #form_id').val(form_id);
        modal.find('.modal-body #file_id').val(file_id);
    })

    $('#modal-b-decline').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var form_id = button.data('formid')
        var file_id = button.data('fileid')
        var modal = $(this)

        modal.find('.modal-body #form_id').val(form_id);
        modal.find('.modal-body #file_id').val(file_id);
    })

        $(function () {
            $('#example2').DataTable()
            $('#example1').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })

/*        $(function () {
            $('#qmsfiles').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })*/

/*    $(function () {
        $('#request_forms').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })*/

/*    $(function () {
        $('#requestlist').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })*/

/*    $(function () {
            $('#FHqmsfiles').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })*/

    $(function () {
        $('#qmsfiles').DataTable()
        $('#request_forms').DataTable()
        $('#requestlist').DataTable()
        $('#FHqmsfiles').DataTable()
        $('#FHrequestList').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })


    </script>

    </body>
</html>