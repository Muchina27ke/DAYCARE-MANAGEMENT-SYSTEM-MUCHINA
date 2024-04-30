<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 2838.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Group list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Groups</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $item = null;
              $value = null;
              $classes = groupController::ctrShowClasses($item, $value);
              foreach ($classes as $key => $value) {
                $item2 = 'teacher_id';
                $value2 = $value['teacher_id'];
                $teacher = tutorController::ctrShowTutors($item2, $value2);
                echo '
                        <tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["name"] . '</td>
                        <td>' . $teacher[0]["name"] . '</td>
                        <td>
    <button class="btn btnEditClass tooltip--left" data-tooltip="Edit class." data-class_id="' . $value["class_id"] . '"><i class="fa fa-pen"></i></button>
    <button class="btn btnDeleteClass tooltip--left" data-tooltip="Delete class." data-class_id="' . $value["class_id"] . '"><i class="fa fa-times"></i></button>
</td>

                        ';
              }

              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->