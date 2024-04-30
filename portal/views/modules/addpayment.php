<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pay</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoices</li>
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
                    <h3 class="card-title">Pay</h3>
                </div>

                <div class="card card-primary">
                    <!-- form start -->
                    <form method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Search invoice to pay</label>
                                <?php
                                if ($_SESSION['user_type'] == 'admin') {
                                    echo '
                                    <select id="invoiceSelect" name="invoice_id" class="form-control select2bs4" style="width: 100%;">
                                        <option value="0" selected="selected">None</option>';

                                    $invoices = invoiceController::ctrShowInvoice(null, null);

                                    foreach ($invoices as $invoice) {
                                        $students = kidsController::ctrShowKids('student_id', $invoice['student_id']);
                                        foreach ($students as $student) {
                                            if ($invoice['due'] > 0) {
                                                echo '<option value="' . $invoice['invoice_id'] . '" data-description="' . $invoice['description'] . '">' . $invoice['title'] . ' || ' . $student['student_id'] . ' || ' . $invoice['due'] . '</option>';
                                            }
                                        }
                                    }

                                    echo '
                                    </select>';
                                } else {
                                    $parent = parentController::ctrShowParents('email', $_SESSION["username"]);
                                    $students = kidsController::ctrShowKids('parent_id', $parent['parent_id']);
                                    echo '
                                    <select id="invoiceSelect" name="invoice_id" class="form-control select2bs4" style="width: 100%;">
                                        <option value="0" selected="selected">None</option>';
                                    foreach ($students as $student) {
                                        $invoices = invoiceController::ctrShowInvoice('student_id', $student['student_id']);
                                        foreach ($invoices as $invoice) {

                                            if ($invoice['due'] > 0) {
                                                echo '<option value="' . $invoice['invoice_id'] . '" data-description="' . $invoice['description'] . '">' . $invoice['title'] . ' || ' . $student['student_id'] . ' || ' . $invoice['due'] . '</option>';
                                            }
                                        }
                                    }
                                    echo '
                                    </select>';
                                }

                                ?>


                            </div>
                            <!-- Hidden fields -->
                            <input type="hidden" name="title" value="">
                            <input type="hidden" name="payment_type" value="fee">
                            <input type="hidden" name="student_id" value="">
                            <input type="hidden" name="method" value="cash">
                            <input type="hidden" name="description" value="">
                            <input type="hidden" name="amount" value="">
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="addclass">Pay</button>
                        </div>
                        <?php
                        $add = new paymentController();
                        $add->addPayment();
                        ?>
                    </form>

                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>

<script>
    $(document).ready(function() {
        $('#invoiceSelect').change(function() {
            var selectedOption = $(this).find('option:selected');
            var optionText = selectedOption.text().trim();
            var parts = optionText.split(' || ');
            $('input[name="title"]').val(selectedOption.text().split(' || ')[0]);
            $('input[name="payment_type"]').val('FEE');
            $('input[name="student_id"]').val(selectedOption.text().split(' || ')[1]);
            $('input[name="method"]').val('Cash');
            $('input[name="description"]').val(selectedOption.data('description'));
            $('input[name="amount"]').val(selectedOption.text().split(' || ')[2]);
        });
    });
</script>