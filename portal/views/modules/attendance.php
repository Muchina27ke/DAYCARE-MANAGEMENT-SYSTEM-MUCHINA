<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 2838.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <?php
      // Connect to your database
      $conn = new mysqli("localhost", "root", "", "swiss_db");

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Fetch student data
      $class = groupController::ctrShowClassesSingle('teacher_id', $_SESSION['username']);
      var_dump($class);
      $class_id = $class['class_id'];
      $sql = "SELECT * FROM student WHERE class_id = $class_id";
      $result = $conn->query($sql);

      // Check if the query execution was successful
      if ($result === false) {
        die("Error executing query: " . $conn->error);
      }

      ?>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Attendance list</h3>
        </div>
        <div class="card-body">
          <form method="post" action="process_attendance.php">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Attendance</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Check if any students were found
                if ($result->num_rows > 0) {
                  // Process the result set
                  while ($row = $result->fetch_assoc()) {
                    $student_id = $row['student_id'];
                    $name = $row['name'];
                    // Check if student's attendance for the current date is not on the attendance list
                    if (!AttendanceController::studentAttendanceExists($student_id, date('Y-m-d'))) {
                ?>
                      <tr>
                        <td><?php echo $student_id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td>
                          <input type="hidden" name="student_id[]" value="<?php echo $student_id; ?>">
                          <input type="radio" name="attendance[<?php echo $student_id; ?>]" value="1"> Present
                          <input type="radio" name="attendance[<?php echo $student_id; ?>]" value="2"> Absent
                        </td>
                      </tr>
                <?php
                    }
                  }
                } else {
                  echo "<tr><td colspan='3'>No students found for this class.</td></tr>";
                }
                ?>
              </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <?php
      // Close the database connection
      $conn->close();
      ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>