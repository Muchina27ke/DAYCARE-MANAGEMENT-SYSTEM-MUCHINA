<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parents</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Parent list</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
            if ($_SESSION['user_type'] == 'admin') {

            ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Parents</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Proffesion</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $item = null;
                                $value = null;
                                $parents = parentController::ctrShowParents($item, $value);

                                foreach ($parents as $key => $value) {

                                    echo '
                        <tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["name"] . '</td>
                        <td>' . $value["email"] . '</td>
                        <td>' . $value["phone"] . '</td>
                        <td>' . $value["address"] . '</td>
                        <td>' . $value["profession"] . '</td>
                        
                        <td>
                        <button class="btn btnDeleteParent tooltip--left" data-tooltip="Delete parent." data-parent_id="' . $value["parent_id"] . '"><i class="fa fa-times"></i></button>
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
            <?php
            } else {
            ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Parents</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Proffesion</th>
                                    <th>Actions</th>
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
                                            <td>' . $parent[0]["name"] . '</td>
                                            <td>' . $parent[0]["email"] . '</td>
                                            <td>' . $parent[0]["phone"] . '</td>
                                            <td>' . $parent[0]["address"] . '</td>
                                            <td>' . $parent[0]["profession"] . '</td>
                                            
                                            <td>
                                            <button class="btn btnOpenThread" data-sender-id="' . $teacher[0]["teacher_id"] . '" data-receiver-id="' . $parent[0]["parent_id"] . '">
                                                <i class="fa fa-message"></i>
                                            </button>
                                        </td>
                                        
                                        
                                            
                                            ';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            <?php
            }
            ?>
    </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->