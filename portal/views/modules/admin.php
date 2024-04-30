<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2838.44px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Administrators</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Administrators list</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Administrators</h3>

                    <div class="card-tools">
                        <button type="button " class="btn btn-primary" data-toggle="modal" data-target="#addAdminModal" title="add">
                            Add admin
                        </button>
                    </div>
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
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $value = null;
                            $admin = adminController::ctrShowAdmin($item, $value);

                            foreach ($admin as $key => $value) {

                                echo '
                        <tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["name"] . '</td>
                        <td>' . $value["email"] . '</td>
                        <td>' . $value["phone"] . '</td>
                        <td>' . $value["dateAdded"] . '</td>
                        
                        <td>
                        <button class="btn btnEditAdmin tooltip--left" data-tooltip="Edit admin." data-admin_id="' . $value["admin_id"] . '"><i class="fa fa-pen"></i></button>
                        <button class="btn btnDeleteAdmin tooltip--left" data-tooltip="Delete admin." data-admin_id="' . $value["admin_id"] . '"><i class="fa fa-times"></i></button>
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
</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="adminName">Name</label>
                        <input type="text" class="form-control" name="adminName" id="adminName" placeholder="Enter admin name">
                    </div>
                    <div class="form-group">
                        <label for="adminemail">Email</label>
                        <input type="email" class="form-control" name="adminemail" id="adminemail" placeholder="Enter admin email">
                    </div>
                    <div class="form-group">
                        <label for="adminphone">Phone</label>
                        <input type="tel" class="form-control" name="adminphone" id="adminphone" placeholder="Enter admin phone">
                    </div>
                    <input type="hidden" name="role" value="1">
                    <!-- <div class="form-group">
                        <label>Role</label>
                        <select name='role' class="form-control">
                            <option>Select a role</option>
                            <option value='1'>Super Administrator</option>
                            <option value="2">Administrator</option>
                            <option value="3">Accounts</option>
                            <option value="4">Academic</option>
                        </select>
                    </div> -->
                    <!-- Password -->
                    <div class="form-group">
                        <label for="adminPassword">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="adminpassword" id="adminPassword" placeholder="Enter password">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="generatePasswordBtn" title="Generate Password" onclick="fillPasswordInput('adminPassword', 10)">Generate</button>
                            </div>
                        </div>
                        <small class="form-text text-muted">Click "Generate" to create a random password.</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="registeradmin" class="btn btn-primary">Save changes</button>
            </div>
            <?php
                $add = new adminController();
                $add->addAdmin();
                ?>
            </form>
        </div>
    </div>
</div>
