@if(!isset(Auth::user()->email))
    <script>window.location = "index";</script>
@endif
<!-- Main Header -->
<header class="main-header">


    <a href="main" class="logo">
        <img src="{{ asset("/bower_components/admin-lte/dist/img/ram.png") }}" width="40" height="55">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">DMS</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <ul class="nav navbar-nav">

            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <li><a href="{{ url('main') }}"><b>Main</b></a></li>

        </ul>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false" >
                        <span class="glyphicon glyphicon-globe"></span> Notifications
                            <span class="badge">{{count(auth()->user()->Notifications)}}</span>


                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach(auth()->user()->unreadNotifications as $notification)
                        <li>
                            @include('layout.partials.notification.'.snake_case(class_basename($notification->type)))

                        </li>
                        @endforeach
                    </ul>

                </li>

                <li class="dropdown user user-menu">
                    <a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
