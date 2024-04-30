<?php
// Establish a database connection
$connection = connection::connect();

// Fetch data from the database
$totalKids = 0;
$totalBabysitters = 0;
$totalRevenue = 0;
$totalUnpaidInvoices = 0;

// Sample query to fetch data (replace with actual queries)
if ($connection) {
    try {
        // Fetch total kids
        $stmt = $connection->prepare("SELECT COUNT(*) AS total FROM student");
        $stmt->execute();
        $totalKids = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Fetch total babysitters
        $stmt = $connection->prepare("SELECT COUNT(*) AS total FROM teacher");
        $stmt->execute();
        $totalBabysitters = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Fetch total revenue
        $stmt = $connection->prepare("SELECT SUM(amount) AS total FROM payment");
        $stmt->execute();
        $totalRevenue = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Fetch total unpaid invoices
        $stmt = $connection->prepare("SELECT COUNT(*) AS total FROM invoice WHERE status = 'unpaid'");
        $stmt->execute();
        $totalUnpaidInvoices = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Output the HTML content with fetched data
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <?php
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
                echo '
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>' . $totalKids . '</h3>
                                        <p>Total Kids</p>
                                    </div>
                                    <div class="icon">
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>' . $totalBabysitters . '</h3>
                                        <p>Total Babysitters</p>
                                    </div>
                                    <div class="icon">
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>' . $totalRevenue . '</h3>
                                        <p>Total Revenue</p>
                                    </div>
                                    <div class="icon">
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>' . $totalUnpaidInvoices . '</h3>
                                        <p>Total unpaid invoices</p>
                                    </div>
                                    <div class="icon">
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->

                </section>
                <!-- /.content -->
                ';
            } else {
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'parent') {
                    $notices = noticeController::ctrShownotice('status', 1);
                    foreach ($notices as $notice) {
                        echo '
                    <div class="card-body">
                    <div class="callout callout-info">
                      <h5>'.$notice['notice_title'].'</h5>
    
                      <p>'.$notice['notice'].'</p>
                    </div>
                  </div>
                  <!-- /.card-body -->
                    ';
                    }
                }
                echo '
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body p-0">
                                        <!-- THE CALENDAR -->
                                        <div id="calendar"></div>
                                    </div>
                                    <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>';
            }
            ?>

        </div>
        <!-- /.content-wrapper -->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Default view when the calendar first loads
            headerToolbar: {
                left: 'prev,next today', // Buttons for navigating to previous/next dates and today
                center: 'title', // Title in the center showing the current month/year
                right: 'dayGridMonth,timeGridWeek,timeGridDay' // Buttons for switching between different views
            },
            events: 'ajax/events.php' // URL to fetch events data
        });
        calendar.render();
    });
</script>