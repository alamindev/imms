<div id="scroll">
    <div id="slide-out" class="sidenav sidenav-fixed">
     <div class="profile">
            <a href="#" class="online"><i class="fa fa-circle"></i> Online</a> 
            @if(Auth::user()->userPhoto != '')
            <img src="{{ asset('/uploads/'.Auth::user()->userPhoto) }}" class="img-rounded" style="width: 100px; height: 100px;">
               @else
                    <img src="{{ asset('/images/avatar.png') }}" class="img-rounded" width="70px">
            @endif
            <a href="{{ url('admin/users/view/'.Auth::user()->id) }}" class="person">{{  Auth::user()->userName  }}</a> 
        </div>
        <br>
        <ul class="sidebar sidebar-wrapper">
            <li class="sidebar"><a href="{{ url('/admin') }}"><i class="fa fa-dashcube" aria-hidden="true"></i>
            DashBoard</a></li>
             <!-- for users -->
           <li class="sidebar"><a style="cursor: pointer" id="slide1"><i class="fa fa-users"></i>Users<span class="pull-right"><i class="fa fa-caret-down carets"></i></span></a>
            <ul id="shows1" style="display: none">
                @if(Auth::user()->roleId == 1)
                <li><a href="{{ url('/admin/users/add') }}"><i class="fa fa-pencil"></i>Add User</a></li>
                @endif
                <li><a href="{{ url('/admin/users') }}"><i class="fa fa-th"></i>Manage User</a></li>
            </ul>
           </li>
             <!-- for category -->
           <li class="sidebar"><a style="cursor: pointer" id="slide"><i class="fa fa-gitlab"></i>Employee<span class="pull-right"><i class="fa fa-caret-down carets"></i></span></a>
            <ul id="shows" style="display: none">
                @if(Auth::user()->roleId == 1)
                 <li><a href="{{ route('add-employee') }}"><i class="fa fa-indent"></i>Add Employee</a></li>
                @endif
                <li><a href="{{ route('employees') }}"><i class="fa fa-industry "></i>Employees</a></li>
            </ul>
           </li>  
            <li class="sidebar"><a href="{{ route('search-employee') }}"><i class="fa fa-microchip"></i> &nbsp; Print-visa</a></li>
            <li class="sidebar"><a href="{{ route('asals') }}"><i class="fa fa-anchor"></i> &nbsp; Asals</a></li>
            <li class="sidebar"><a href="{{ route('asalbills') }}"><i class="fa fa-gitlab"></i> &nbsp; Asal bill</a></li>
           @if(Auth::user()->roleId == 1)
             <!-- for recycle bin -->
           <li class="sidebar"><a style="cursor: pointer" id="slide2"><i class="fa fa-recycle "></i>Recycle Bin<span class="pull-right"><i class="fa fa-caret-down carets"></i></span></a>
            <ul id="shows2" style="display: none"> 
                 <li><a href="{{ route('employee_re') }}"><i class="fa fa-male "></i>Employee Recycle</a></li>
                <li><a href="{{ route('user_re') }}"><i class="fa fa-users"></i>User Recycle</a></li>
                  <li><a href="{{ route('asalbill_re') }}"><i class="fa fa-gitlab"></i>asal bill Recycle</a></li>   
            </ul>
           </li> 
            @endif  

            <!-- for mobile visiable -->
            <ul id="mobile-demo">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
                <!-- Dropdown Structure -->
                <ul id="dropdown2" class="dropdown-content">
                    <li><a href="#!">one</a></li>
                    <li><a href="#!">two</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">three</a></li>
                </ul>
            </ul>
        </ul>
    </div>
</div>
 