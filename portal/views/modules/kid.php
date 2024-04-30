<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kids</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kids list</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kids</h3>
                </div>
                <!-- /.card-header -->

                <?php
                if ($_SESSION['user_type'] == 'admin') {

                ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Religion</th>
                                    <th>Parent</th>
                                    <th>Class</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $item = null;
                                $value = null;
                                $kids = kidsController::ctrShowKids($item, $value);

                                foreach ($kids as $key => $value) {
                                    $item1 = 'class_id';
                                    $value1 = $value['class_id'];
                                    $classes = groupController::ctrShowClasses($item1, $value1);
                                    $item1 = 'parent_id';
                                    $value1 = $value['parent_id'];
                                    $parent = parentController::ctrShowParents($item1, $value1);

                                    // var_dump($parent);
                                    echo '
                        <tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["name"] . '</td>
                        <td>' . $value["birthday"] . '</td>
                        <td>' . $value["sex"] . '</td>
                        <td>' . $value["religion"] . '</td>
                        <td>' . $parent[0]["name"] . '</td>
                        <td>' . $classes[0]["name"] . '</td>
                        
                        <td>
    <button class="btn btnEditKid tooltip--left" data-tooltip="Edit kid." data-kid_id="' . $value["student_id"] . '"><i class="fa fa-pen"></i></button>
    <button class="btn btnDeleteKid tooltip--left" data-tooltip="Delete kid." data-kid_id="' . $value["student_id"] . '"><i class="fa fa-times"></i></button>
</td>
                        ';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                <?php
                } else {
                ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Religion</th>
                                    <th>Parent</th>
                                    <th>Class</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $teacher = tutorController::ctrShowTutors('teacher_id', $_SESSION['username']);
                                $class = groupController::ctrShowClasses('teacher_id', $teacher[0]['teacher_id']);
                                if ($class) {
                                    $students = kidsController::ctrShowKids('class_id', $class[0]['class_id']);
                                    foreach ($students as $key => $value) {
                                        $parent = parentController::ctrShowParents('parent_id', $value['parent_id']);
                                        echo '
                                    <tr>
                                    <td>' . ($key + 1) . '</td>
                                    <td>' . $value["name"] . '</td>
                                    <td>' . $value["birthday"] . '</td>
                                    <td>' . $value["sex"] . '</td>
                                    <td>' . $value["religion"] . '</td>
                                    <td>' . $parent[0]["name"] . '</td>
                                    <td>' . $class[0]["name"] . '</td>
                                    ';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                <?php
                }
                ?>
            </div>
            <!-- /.card -->
    </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->