@if(!isset(Auth::user()->email))
 <script>window.location = "index";</script>
@else

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <div class="user-panel">
                <div class="pull-left image">
                  <img src="{{ asset("/bower_components/admin-lte/dist/img/avatar3.png") }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p>{{ Auth::user()->first_name }}</p>
                  <a href=""><span class="text-warning"> {{ Auth::user()->userDepartment->departments_name }} </span></a>
                </div>
            </div>

            @if( Auth::user()->status == 2 )
            <!--This is for author-->
            <li class="header">DASHBOARD</li>
            {{--<li class="{{ Request::is('change_request_form') ? 'active' : '' }}"><a href="change_request_form"><i class="fa fa-edit (alias)"></i><span>Change Request Form</span></a></li>--}}
            <li class="{{ Request::is('change_request_list') ? 'active' : ''  }}"><a href="change_request_list"><i class="fa fa-files-o"></i><span>CRF</span></a></li>
            <li class="{{ Request::is('editable_files') ? 'active' : '' }}"><a href="editable_files"><i class="fa fa-files-o"></i><span>QMS Editable Files</span></a></li>
            <li class="{{ Request::is('qms_author') ? 'active' : '' }}"><a href="qms_author"><i class="fa fa-file-o"></i><span>QMS Files</span></a></li>
            <li class="{{ Request::is('creation_list') ? 'active' : '' }}"><a href="creation_list"><i class="fa fa-file-o"></i><span>Document Creation</span></a></li>
            @elseif(Auth::user()->status == 4)
            <!--This is for File Holder-->
            <li class="header">E-Holder DASHBOARD</li><!--for the mean time-->
            <li class="{{ Request::is('request_list') ? 'active' : '' }}"><a href="request_list"><i class="fa fa-files-o"></i><span>Document Request List</span></a></li>
            <li class="{{ Request::is('qms') ? 'active' : '' }}"><a href="qms"><i class="fa fa-files-o"></i><span>QMS files</span></a></li>

            @elseif(Auth::user()->status == 1)
            <!--This is for Approver-->
            <li class="header">APPROVER DASHBOARD</li><!--for the mean time-->
                <li class="{{ Request::is('qms_approver') ? 'active' : '' }}"><a href="qms_approver"><i class="fa fa-files-o"></i><span>Document Request Forms</span></a></li>
                <li class="{{ Request::is('request_forms') ? 'active' : '' }}"><a href="request_forms"><i class="fa fa-files-o"></i><span>QMS Files</span></a></li>


            @elseif(Auth::user()->status == 3)
            <!--This is for QA-->
                <li class="header">QA DASHBOARD</li><!--for the mean time-->
                <li class="{{ Request::is('quality_assurance') ? 'active' : '' }}"><a href="quality_assurance"><i class="fa fa-files-o"></i><span>Files for Approval</span></a></li>
            @endif



        </ul><!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->
</aside>
@endif