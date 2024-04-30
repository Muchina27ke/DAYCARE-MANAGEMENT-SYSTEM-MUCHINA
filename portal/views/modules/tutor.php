<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Babysitters</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Babysitter list</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <?php
        // Check if the session username corresponds to an admin user
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
        ?>
            <!-- Main content -->
            <section class="content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Babysitters</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTutorModal" title="Add">
                                Add Tutor
                            </button>
                        </div>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Teacher ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $item = null;
                                $value = null;
                                $tutors = tutorController::ctrShowTutors($item, $value);

                                foreach ($tutors as $key => $value) {
                                    echo '
                                <tr>
                                <td>' . ($key + 1) . '</td>
                                <td>' . $value['teacher_id'] . '</td>
                                <td>' . $value["name"] . '</td>
                                <td>' . $value["email"] . '</td>
                                <td>' . $value["phone"] . '</td>
                                <td>' . $value["address"] . '</td>
                                <td>' . $value["date"] . '</td>
                                
                                <td>
                                <button class="btn btnEditTutor tooltip--left" data-tooltip="Edit Tutor." data-tutor_id="' . $value["teacher_id"] . '"><i class="fa fa-pen"></i></button>
                                <button class="btn btnDeleteTutor tooltip--left" data-tooltip="Delete Tutor." data-tutor_id="' . $value["teacher_id"] . '"><i class="fa fa-times"></i></button>
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
    </div>

    </section>
    <!-- /.content -->

<?php
        } elseif (isset($_SESSION['username']) && $_SESSION['user_type'] === 'parent') {
            $parent = parentController::ctrShowParents('email', $_SESSION['username']);
            $parent_id = $parent['parent_id'];

            // Fetch kids for the parent
            $students = kidsController::ctrShowKids('parent_id', $parent_id);
?>


    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Babysitters</h3>

                <div class="card-tools">
                </div>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Babysitter</th>
                            <th>Child</th>
                            <th>Group</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($students as $student) {
                            $classes = groupController::ctrShowClasses('class_id', $student['class_id']);
                            foreach ($classes as $class) {
                                $teacher = tutorController::ctrShowTutors('teacher_id', $class['teacher_id']);
                                foreach ($teacher as $key => $value) {
                                    echo '
                                            <tr>
                                            <td>' . $value['name'] . '</td>
                                            <td>' . $student['name'] . '</td>
                                            <td>' . $class['name'] . '</td>
                                            <td>
                                            <button class="btn btnOpenThread" data-sender-id="' . $parent["parent_id"] . '" data-receiver-id="' . $value["teacher_id"] . '">
                                                <i class="fa fa-message"></i>
                                            </button>
                                        </td>
                                        
                                            </tr>
                                                ';
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>

</section>
<!-- /.content -->
<?php
        }
?>


</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="addTutorModal" tabindex="-1" role="dialog" aria-labelledby="addTutorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTutorModalLabel">Add Tutor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addTutorForm" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <?php
                        // Calculate the maximum allowed birthdate
                        $maxBirthdate = date('Y-m-d', strtotime('-18 years'));
                        ?>
                        <input type="date" class="form-control" id="birthday" name="birthday" max="<?php echo $maxBirthdate; ?>">
                    </div>

                    <div class="form-group">
                        <label for="sex">Sex</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="male" value="Male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="female" value="Female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="religion">Religion</label>
                        <select class="form-control" id="religion" name="religion">
                            <option value="Christianity">Christianity</option>
                            <option value="Islam">Islam</option>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Buddhism">Buddhism</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Tutor</button>
                    <?php
                    $add = new tutorController();
                    $add->addTeacher();
                    ?>
                </form>
            </div>

        </div>
    </div>
</div>