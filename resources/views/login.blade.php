<head>
        <meta charset="UTF-8">
        <title>{{ $page_title or "Login to your account" }}</title>
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

	.login-reg-panel{
	    position: relative;
	    top: 50%;
	    transform: translateY(-50%);
		text-align:center;
	    width:70%;
		right:0;left:0;
	    margin:auto;
	    height:400px;
	    background-color: rgba(236, 48, 20, 0.9);
	    background-color: #fbb040;
	}

	.login-info-box{
	    width:30%;
	    padding:0 5px;
	    top:20%;
	    right:0;
	    color: #fff;
	    position:absolute;
	    text-align:left;
	}

	.white-panel{
	    background-color: rgba(255,255, 255, 1);
	    height:500px;
	    position:absolute;
	    top:-50px;
	    width:50%;
	    right:calc(50% - 50px);
	    transition:.3s ease-in-out;
	    z-index:0;
	    box-shadow: 0 0 15px 9px #00000096;
	}



	.login-show input[type="text"], .login-show input[type="password"]{
	    width: 100%;
	    display: block;
	    margin:20px 0;
	    padding: 15px;
	    border: 1px solid #b5b5b5;
	    outline: none;
	}

	.login-show .button {
	    max-width: 150px;
	    width: 100%;
	    background: #444444;
	    background: #fbb040;
	    color: #f9f9f9;
	    border: none;
	    padding: 10px;
	    text-transform: uppercase;
	    border-radius: 2px;
	    float:right;
	    cursor:pointer;
	}

	.show-log-panel{
	    display:block;
	    opacity:0.9;
	}
	
	.login-show a{
	    display:inline-block;
	    padding:10px 0;
	}

	.login-reg-panel #label-login{
	    border:1px solid #9E9E9E;
	    padding:5px 5px;
	    width:150px;
	    display:block;
	    text-align:center;
	    border-radius:10px;
	    cursor:pointer;
	    font-weight: 600;
	    font-size: 18px;
	}

	.login-show{
	    z-index: 1;
	    transition:0.3s ease-in-out;
	    color:#242424;
	    text-align:left;
	    padding:50px;
	}




	
</style>

</head>



<div class="login-reg-panel">
		<div class="login-info-box">
			<img src="{{ asset("/bower_components/admin-lte/dist/img/ram.png") }}" height="160" width="140">
			<h3>Real Projects. Real Learning.</h3>
		</div>
							
		<div class="white-panel">
			<div class="login-show">
				<center><h3>APC Document Management System</h3></center>
				<br>
				<form method="post" action="{{ url('checklogin') }}">
					{{ csrf_field() }}
					
			<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" required>
			<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
					<input type="submit" class="button" value="Login" >
					 <label>
                        <input type="checkbox"> Remember me
                      </label>
				</form>
				<!-- <a href="">Forgot password?</a> -->
				<br><br>
				<a href="https:/www.apc.edu.ph">Asia Pacific College &copy; 2019 </a>
			</div>
		</div>
</div>