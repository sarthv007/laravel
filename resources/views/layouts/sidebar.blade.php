<!-- Sidebar -->
    <ul class="sidebar navbar-nav">

@if(auth()->user()->role->role === 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/list-users">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Users</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/student/list-students">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Students</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/import-user">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Imports</span>
        </a>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="/payments">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Payments</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/student/fees">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Fees</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/leave/list-leaves">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Leave</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/course/list-courses">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Courses</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/branch/list-branch">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Branches</span>
        </a>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="/notice/list-notice">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Notice</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/result/list-results">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Documents</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/department/list-departments">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Departments</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/download-reason">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Download Reason</span>
        </a>
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

    @endif

    @if(auth()->user()->role->role === 'hod')
    <li class="nav-item active">
        <a class="nav-link" href="/download-reason">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
    <li class="nav-item active">
        <a class="nav-link" href="/hod/list-leaves">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Leaves</span>
        </a>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="/hod/faculties">
          <i class="fas fa-fw fa-folder"></i>
          <span>Faculty List</span>
        </a>
      </li>
    @endif

    @if(auth()->user()->role->role === 'principal')
    <li class="nav-item active">
        <a class="nav-link" href="/download-reason">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
    <li class="nav-item active">
        <a class="nav-link" href="/principal/list-leaves">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage Leaves</span>
        </a>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="/principal/faculties">
          <i class="fas fa-fw fa-folder"></i>
          <span>Faculty List</span>
        </a>
      </li>

    @endif

    @if(auth()->user()->role->role === 'teachers')
    <li class="nav-item active">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

    <li class="nav-item active">
        <a class="nav-link" href="/employee/profile">
          <i class="fas fa-fw fa-folder"></i>
          <span>Update Profile</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/leave-application/list-leave-application">
          <i class="fas fa-fw fa-folder"></i>
          <span>Apply Leave</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/employee/salary-details">
          <i class="fas fa-fw fa-folder"></i>
          <span>Salary Details</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/employee/salary-sleep">
          <i class="fas fa-fw fa-folder"></i>
          <span>Salary Sleep</span>
        </a>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="/employee/attendance">
          <i class="fas fa-fw fa-folder"></i>
          <span>Attedance Details</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
           document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#logoutModal">
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
          <i class="fas fa-fw fa-folder"></i>
          <span>Signout</span>
        </a>
      </li>
    @endif

      
    </ul>