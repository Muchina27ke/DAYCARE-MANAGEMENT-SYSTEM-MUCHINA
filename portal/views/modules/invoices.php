<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoices</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice list</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Invoice</h3>
                    <?php
                    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
                        echo '
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addInvoiceModal" title="Add">
                                Create Invoice
                            </button>
                        </div>
                        ';
                    }
                    ?>
                </div>
                <?php
                if ($_SESSION['user_type'] == 'admin') {

                ?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Fee</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $item = null;
                                $value = null;
                                $invoice = invoiceController::ctrShowInvoice($item, $value);

                                foreach ($invoice as $key => $value) {
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
                        <td>' . $value["amount_paid"] . '</td>
                        <td>' . $value["due"] . '</td>
                        ' ?>

                                        <?php

                                        if ($value["status"] == 'paid') {
                                            echo '<td><button class="btn btn-success btn-sm">Paid</button></td>';
                                        } elseif ($value["status"] == 'unpaid') {
                                            echo '<td><button class="btn btn-danger btn-sm">Unpaid</button></td>';
                                        }
                                        ?>
                                <?php
                                        echo '
                        <td>' . $value["creation_timestamp"] . '</td>
                        
                        <td>
                        <button class="btn btnDeleteInvoice tooltip--left" data-tooltip="Delete invoice." data-invoice_id="' . $value["invoice_id"] . '"><i class="fa fa-times"></i></button>
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
                } else {
        ?>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Fee</th>
                            <th>Amount</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $parent = parentController::ctrShowParents('email', $_SESSION['username']);
                        $item1 = 'parent_id';
                        $value1 = $parent['parent_id'];
                        $kids = kidsController::ctrShowKids($item1, $value1);

                        foreach ($kids as $kid) {
                            $item = 'student_id';
                            $value = $kid['student_id'];
                            $invoice = invoiceController::ctrShowInvoice($item, $value);

                            foreach ($invoice as $key => $value) {

                                echo '
                        <tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $kid["name"] . '</td>
                        <td>' . $value["title"] . '</td>
                        <td>' . $value["amount"] . '</td>
                        <td>' . $value["amount_paid"] . '</td>
                        <td>' . $value["due"] . '</td>
                        ' ?>

                                <?php

                                if ($value["status"] == 'paid') {
                                    echo '<td><button class="btn btn-success btn-sm">Paid</button></td>';
                                } elseif ($value["status"] == 'unpaid') {
                                    echo '<td><button class="btn btn-danger btn-sm">Unpaid</button></td>';
                                }
                                ?>
                        <?php
                                echo '
                        <td>' . $value["creation_timestamp"] . '</td>
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

<!-- Modal -->
<div class="modal fade" id="addInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvoiceModalLabel">Create Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
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
                    <div class="form-group">
                        <label for="invoiceTitle">Title</label>
                        <input type="text" class="form-control" name="invoiceTitle" id="invoiceTitle" placeholder="Enter invoice title">
                    </div>
                    <div class="form-group">
                        <label for="invoiceTitle">Short Description</label>
                        <input type="text" class="form-control" name="invoiceDescription" id="invoiceDescription" placeholder="Enter short description">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            <?php
            $create = new invoiceController();
            $create->ctrCreateInvoice();
            ?>
            </form>
        </div>
    </div>
</div>