@if(!isset(Auth::user()->email))
    <script>window.location = "index";</script>
@endif
<html>
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

   <style type="text/css">
        {{--body{
            background:
                /* top, transparent black */
                    linear-gradient( rgba(255,255,255,0.7), rgba(255,255,255,0.7) ),
                        /* bottom, image */
                    url("{{ asset("/bower_components/admin-lte/dist/img/video_img_3.jpg") }}");
            background-size: cover;
            background-attachment: fixed;
            font-family: Arial,sans-serif;
        }--}}

        #box{
        box-shadow: #0a0a0a 0px 0px 1px 0px; padding: 5px; background: #fbb040;
        }

    </style>

</head>
<body>
<div class="container">
    <div class="col-lg-12 offset-4" style="margin-top: 10%;">
        <h1 align="center">Document Management System</h1>

        <div class="row" style="margin-top: 10%;">
            <div class="col-lg-4" id="box">
                <center>
                    <span class="fa fa-file-o" style="font-size: 50px;"></span>
                    <a href="documentCreation"><h3>Document Creation</h3></a>
                </center>
            </div>
            <div class="col-lg-4">&nbsp;</div>
            <div class="col-lg-4" id="box">
                <center>
                    <span class="fa fa-file-text-o" style="font-size: 50px;"></span>
                    <a href="documentRev"><h3>Document Revision</h3></a>
                </center>
            </div>
        </div>

        <h5 align="center" style="margin-top: 20%;">Asia Pacific College. All rights reserved.<br>Copyright © 2019</h5>
    </div>
</div>

</body>
</html>