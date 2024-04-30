<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Payment list</li>
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
                        <h3 class="card-title">Payments</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Payment</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $item = null;
                                $value = null;
                                $payment = paymentController::ctrShowPayment($item, $value);
                                foreach ($payment as $key => $value) {
                                    $item1 = 'student_id';
                                    $value1 = $value['student_id'];
                                    $kids = kidsController::ctrShowKids($item1, $value1);
                                    foreach ($kids as $kid) {
                                        echo '
                        <tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $kid["name"] . '</td>
                        <td>' . $value["title"] . '</td>
                        <td>' . $value["amount"] . '</td>
                        <td>' . $value["timestamp"] . '</td>
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
            } else {
            ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payments</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Payment</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $parent = parentController::ctrShowParents('email', $_SESSION['username']);
                                $kids = kidsController::ctrShowKids('parent_id', $parent['parent_id']);
                                foreach ($kids as $key => $value) {
                                    $payment = paymentController::ctrShowPayment('student_id', $value['student_id']);
                                    if ($payment) {
                                        echo '
                                        <tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value["name"] . '</td>
                                        <td>' . $payment["title"] . '</td>
                                        <td>' . $payment["amount"] . '</td>
                                        <td>' . $payment["timestamp"] . '</td>
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