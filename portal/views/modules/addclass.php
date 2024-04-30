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
                            <li class="breadcrumb-item active">Add Group</li>
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
                    <h3 class="card-title">Add Group</h3>
                </div>
                <div class="card card-primary">
                    <!-- form start -->
                    <form method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="class">Group</label>
                                <input type="text" class="form-control" name="class" id="class" placeholder="Enter group name">
                            </div>
                            <div class="form-group">
                                <label>Babysitter</label>
                                <select class="form-control select2bs4" name="tutor" style="width: 100%;">
                                    <option selected="selected">None</option>

                                    <?php
                                    $tutors = tutorController::ctrShowTutors(null, null);
                                    foreach ($tutors as $tutor) {
                                        echo '
                                        <option value=' . $tutor['teacher_id'] . '>' . $tutor['name'] . '</option>
                                        ';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="class">Amount</label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter fee amount">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="addclass">Add class</button>
                        </div>
                        <?php
                        $add =new groupController();
                        $add->ctrAddClass();

                        ?>
                    </form>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->