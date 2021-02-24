<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="attendance.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Attendance List</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Employee</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="employee_list.php">Employee List</a></li>
                <li class="nav-item"> <a class="nav-link" href="overtime.php">Overtime</a></li>
                <li class="nav-item"> <a class="nav-link" href="cash_advance.php">Cash Advance</a></li>
                <li class="nav-item"> <a class="nav-link" href="schedules.php">Schedules</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="deductions.php">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Deductions</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="positions.php">
              <i class="ti-pie-chart menu-icon"></i>
              <span class="menu-title">Positions</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="payroll.php">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">Payroll</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="schedule_list.php">
              <i class="ti-star menu-icon"></i>
              <span class="menu-title">Schedule</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Client Side Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="client_time_in.php"> Time In </a></li>
                <li class="nav-item"> <a class="nav-link" href="client_time_out.php"> Time Out </a></li>
                
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>