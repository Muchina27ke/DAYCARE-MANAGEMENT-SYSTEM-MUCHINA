<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admission</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admit child</h3>
                </div>
                <div class="card card-primary">
                    <!-- form start -->
                    <form method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="class">Name</label>
                                <input type="text" class="form-control" id="kname" name="kname" placeholder="Enter child's name">
                            </div>
                            <div class="form-group">
                                <label for="class">Date of Birth</label>
                                <?php
                                // Calculate the date 6 months ago from the current date
                                $sixMonthsAgo = date('Y-m-d', strtotime('-6 months'));
                                ?>
                                <input type="date" class="form-control" id="DOB" name="DOB" placeholder="Enter DOB" max="<?php echo $sixMonthsAgo; ?>">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="male" name="gender" value="male">
                                    <label for="male" class="custom-control-label">Male</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="female" name="gender" value="female">
                                    <label for="female" class="custom-control-label">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Religion</label>
                                <select class="form-control select2bs4" name="religion" style="width: 100%;">
                                    <option selected="selected">None</option>
                                    <option>Christian</option>
                                    <option>Muslim</option>
                                    <option>Budhist</option>
                                    <option>Ethnic</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control select2bs4" name="parent" style="width: 100%;">
                                    <option selected="selected">Select parent</option>
                                    <?php
                                    $item = null;
                                    $value = null;
                                    $parents = parentController::ctrShowParents($item, $value);

                                    foreach ($parents as $parent) {
                                        echo '<option value="' . $parent['parent_id'] . '">' . $parent['name'] . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Class</label>
                                <select class="form-control select2bs4" name="class" style="width: 100%;">
                                    <option selected="selected">Select class</option>
                                    <?php
                                    $item = null;
                                    $value = null;
                                    $classes = groupController::ctrShowClasses($item, $value);

                                    foreach ($classes as $class) {
                                        echo '<option value="' . $class['class_id'] . '">' . $class['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="addclass">Admit child</button>
                        </div>
                        <?php
                        $add = new kidsController();
                        $add->addAdmission();
                        ?>
                    </form>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->