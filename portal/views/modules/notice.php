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
                            <li class="breadcrumb-item active">Notice list</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Notice</h3>
                    <div class="card-tools">
                        <button type="button " class="btn btn-primary" data-toggle="modal" data-target="#addNoticeModal" title="add">
                            Add Notice
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Notice</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $value = null;
                            $notice = noticeController::ctrShownotice($item, $value);

                            foreach ($notice as $key => $value) {
                                echo '
                        <tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["notice_title"] . '</td>
                        <td>' . $value["notice"] . '</td>
                        ' ?>
                                <td>
                                    <?php if ($value["status"] == 1) : ?>
                                        <button class="btn btn-success btn-sm btn-update-status" data-notice-id="<?php echo $value["notice_id"]; ?>" data-status="0">Active</button>
                                    <?php else : ?>
                                        <button class="btn btn-danger btn-sm btn-update-status" data-notice-id="<?php echo $value["notice_id"]; ?>" data-status="1">Inactive</button>
                                    <?php endif; ?>
                                </td>

                            <?php
                               echo '<td>' . $value["create_timestamp"] . '</td>';
                               if ($_SESSION['user_type'] == 'admin') {
                                   echo ' <td>
                        
                                   <button class="btn btnDeleteNotice tooltip--left" data-tooltip="Delete notice." data-notice_id="' . $value["notice_id"] . '"><i class="fa fa-times"></i></button>
                               </td>';
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
</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="addNoticeModal" tabindex="-1" role="dialog" aria-labelledby="addNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNoticeModalLabel">Add Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields for adding notice here -->
                <form method="post" id="addNoticeForm">
                    <div class="form-group">
                        <label for="noticeTitle">Notice Title</label>
                        <input type="text" class="form-control" id="noticeTitle" name="noticeTitle" placeholder="Enter notice title">
                    </div>
                    <div class="form-group">
                        <label for="noticeContent">Notice Content</label>
                        <textarea class="form-control" id="noticeContent" name="noticeContent" rows="3" placeholder="Enter notice content"></textarea>
                    </div>
                    <!-- Add more fields if needed -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="addNoticeBtn">Save Notice</button>

            </div>
            <?php
            noticeController::addNotice();
            ?>
            </form>
        </div>
    </div>
</div>


<!-- Modal for editing notice -->
<div class="modal fade" id="editNoticeModal" tabindex="-1" role="dialog" aria-labelledby="editNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNoticeModalLabel">Edit Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editNoticeForm">
                    <input type="hidden" id="editNoticeId" name="notice_id">
                    <div class="form-group">
                        <label for="editNoticeTitle">Title</label>
                        <input type="text" class="form-control" id="editNoticeTitle" name="editNoticeTitle">
                    </div>
                    <div class="form-group">
                        <label for="editNoticeContent">Content</label>
                        <textarea class="form-control" id="editNoticeContent" name="editNoticeContent"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>