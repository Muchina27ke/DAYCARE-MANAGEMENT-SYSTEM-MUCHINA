<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class activity</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Activities</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Activity</h3>
            </div>
            <div class="card card-primary">
                <!-- form start -->
                <form method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Group</label>
                            <select class="form-control select2bs4" name="group" style="width: 100%;">
                                <option selected="selected">Select group</option>
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
                    <div class="form-group">
                        <label for="class">Activity</label>
                        <input type="text" name="activity" class="form-control" id="activity" placeholder="Activity name">
                    </div>
                    <div class="form-group">
                        <label for="class">Start Time</label>
                        <input type="time" class="form-control" name="startime" id="startime">
                    </div>
                    <div class="form-group">
                        <label for="class">End Time</label>
                        <input type="time" class="form-control" id="endtime" name="endtime">
                    </div>
                    <div class="form-group">
                        <label>Day</label>
                        <select class="form-control select2bs4" name="day" style="width: 100%;">
                            <option selected="selected">None</option>
                            <option value="1">Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thursday</option>
                            <option value="5">Friday</option>
                        </select>
                    </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="addclass">Add Activity</button>
            </div>
            <?php
            $add = new activityController();
            $add->ctrAddActivity();
            ?>
            </form>
        </div>
    </div>
    <!-- /.card -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->