  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
      <span class="brand-text font-weight-light">Swiss Bear Daycare</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class='fa-solid fa-house-user icon'></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php
          if ($_SESSION['user_type'] == 'admin') {
            echo '
        <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fa-solid fa-school"></i>
          <p>
            Group
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="addclass" class="nav-link">

              <p>Add Group</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="class" class="nav-link">
              <p>Group list</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-calendar-days"></i>
              <p>
                Group Schedules
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addactivity" class="nav-link">

                  <p>Add schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="activities" class="nav-link">
                  <p>Timetable</p>
                </a>
              </li>

            </ul>
          </li>
        ';
          }

          if ($_SESSION['user_type'] == 'teacher') {
            echo '<li class="nav-item">
            <a href="parents" class="nav-link">
              <i class="fa-solid fa-user"></i>
              <p>
                Parents
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kid" class="nav-link">
              <i class="fa-solid fa-user"></i>
              <p>
                Kids
              </p>
            </a>
          </li>
          ';
          }

          if ($_SESSION['user_type'] == 'admin') {
            echo '<li class="nav-item">
        <a href="parents" class="nav-link">
          <i class="fa-solid fa-user"></i>
          <p>
            Parents
          </p>
        </a>
      </li>

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="fa-solid fa-graduation-cap"></i>
        <p>
          Kids section
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="admission" class="nav-link">

            <p>Admit Kid</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="kid" class="nav-link">
            <p>Kids</p>
          </a>
        </li>
      </ul>
    </li>
      
      ';
          }
          ?>


          <?php
          if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'parent') {
            echo '
              
          <li class="nav-item">
          <a href="tutor" class="nav-link">
            <i class="fa-solid fa-chalkboard-user"></i>
            <p>
              Babysitters
            </p>
          </a>
        </li>
              ';
          }
          ?>

          <?php
          // if ($_SESSION['user_type'] == 'teacher') {
          //   echo '
          // <li class="nav-item">
          //   <a href="attendance" class="nav-link">
          //     <i class="fa-solid fa-clipboard-user"></i>
          //     <p>
          //       Attendance
          //     </p>
          //   </a>
          // </li>
          // ';
          // }
          ?>

          <?php
          if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'parent') {
            echo '
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-file-invoice-dollar"></i>
              <p>
                Invoices and Payments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

             
              <li class="nav-item">
                <a href="addpayment" class="nav-link">
                  <p>Add Payment</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="payments" class="nav-link">
                <p>Payments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="invoices" class="nav-link">
                <p>Invoices</p>
              </a>
            </li>
          </ul>
        </li>
              
              ';
          } ?>


          <?php
          if ($_SESSION['user_type'] == 'admin') {
            echo '
          <li class="nav-item">
            <a href="notice" class="nav-link">
              <i class="fa-regular fa-note-sticky"></i>
              <p>Notice Board</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="messages" class="nav-link">
              <i class="fa-solid fa-message"></i>
              <p>Messages</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="admin" class="nav-link">
              <i class="fa-solid fa-user-tie"></i>
              <p>Administrators</p>
            </a>
          </li>';
          }
          ?>
          <!-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fa-solid fa-gears"></i>
              <p>Settings</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="fa-solid fa-right-from-bracket"></i>
              <p>Log out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>