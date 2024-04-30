<?php

session_start();

// Check if the current page is the login page
$isLoginPage = (!isset($_SESSION['username']) || isset($_GET['route']) && $_GET['route'] === 'login');

?>

<body class="hold-transition sidebar-mini layout-fixed <?php echo $isLoginPage ? 'login-page' : ''; ?>">


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Swiss Bear System</title>

    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- FullCalendar JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="views/plugins/jqvmap/jqvmap.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="views/plugins/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="views/dist/css/login.css">
    <link rel="stylesheet" href="views/dist/css/style.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="views/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- summernote -->
    <link rel="stylesheet" href="views/plugins/summernote/summernote-bs4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body class="hold-transition sidebar-mini layout-fixed <?php echo $isLoginPage ? 'login-page' : ''; ?>">


    <?php
    if ((isset($_SESSION['beginSession']) && $_SESSION['beginSession'] == 'ok')) {
      if ($_SESSION['user_type'] == 'admin') {
        if (isset($_GET['route'])) {
          if (
            $_GET['route'] == "dashboard" ||
            $_GET['route'] == "admin" ||
            $_GET['route'] == "addclass" ||
            $_GET['route'] == "addactivity" ||
            $_GET['route'] == "activities" ||
            $_GET['route'] == "admission" ||
            $_GET['route'] == "kid" ||
            $_GET['route'] == "tutor" ||
            $_GET['route'] == "addpayment" ||
            $_GET['route'] == "messages" ||
            $_GET['route'] == "attendance" ||
            $_GET['route'] == "payments" ||
            $_GET['route'] == "send_message" ||
            $_GET['route'] == "fetch_message" ||
            $_GET['route'] == "invoices" ||
            $_GET['route'] == "notice" ||
            $_GET['route'] == "parents" ||
            $_GET['route'] == "logout" ||
            $_GET['route'] == "class"
          ) {
            include 'modules/navbar.php';
            include 'modules/sidebar.php';
            include "modules/" . $_GET['route'] . ".php";
            include 'modules/footer.php';
          } else {
            include "modules/404.php";
          }
        } else {
          include 'modules/navbar.php';
          include 'modules/sidebar.php';
          include 'modules/dashboard.php';
          include 'modules/footer.php';
        }
      }else{
        if ($_SESSION['user_type'] == 'parent') {
          if (isset($_GET['route'])) {
            if (
              $_GET['route'] == "dashboard" ||
              $_GET['route'] == "kid" ||
              $_GET['route'] == "tutor" ||
              $_GET['route'] == "addpayment" ||
              $_GET['route'] == "messages" ||
              $_GET['route'] == "payments" ||
              $_GET['route'] == "send_message" ||
              $_GET['route'] == "fetch_message" ||
              $_GET['route'] == "invoices" ||
              $_GET['route'] == "logout"
            ) {
              include 'modules/navbar.php';
              include 'modules/sidebar.php';
              include "modules/" . $_GET['route'] . ".php";
              include 'modules/footer.php';
            } else {
              include "modules/404.php";
            }
          } else {
            include 'modules/navbar.php';
            include 'modules/sidebar.php';
            include 'modules/dashboard.php';
            include 'modules/footer.php';
          }
        }
      }if ($_SESSION['user_type'] == 'teacher') {
        if (isset($_GET['route'])) {
          if (
            $_GET['route'] == "dashboard" ||
            $_GET['route'] == "activities" ||
            $_GET['route'] == "kid" ||
            $_GET['route'] == "messages" ||
            $_GET['route'] == "attendance" ||
            $_GET['route'] == "send_message" ||
            $_GET['route'] == "fetch_message" ||
            $_GET['route'] == "parents" ||
            $_GET['route'] == "logout"
          ) {
            include 'modules/navbar.php';
            include 'modules/sidebar.php';
            include "modules/" . $_GET['route'] . ".php";
            include 'modules/footer.php';
          } else {
            include "modules/404.php";
          }
        } else {
          include 'modules/navbar.php';
          include 'modules/sidebar.php';
          include 'modules/dashboard.php';
          include 'modules/footer.php';
        }
      }
    } else {
      include 'modules/login.php';
    }

    ?>


    <script src="views/js/notice.js"></script>
    <script src="views/js/class.js"></script>
    <script src="views/js/kid.js"></script>
    <script src="views/js/teacher.js"></script>
    <script src="views/js/invoice.js"></script>
    <script src="views/js/admin.js"></script>
    <script src="views/js/parent.js"></script>
    <script src="views/modules/messages.js"></script>

    <!-- jQuery -->
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="views/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="views/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="views/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="views/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="views/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="views/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="views/plugins/moment/moment.min.js"></script>
    <script src="views/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="views/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="views/plugins/fullcalendar/main.js"></script>
    <!-- overlayScrollbars -->
    <script src="views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="views/plugins/jszip/jszip.min.js"></script>
    <script src="views/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="views/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="views/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Select2 -->
    <script src="views/plugins/select2/js/select2.full.min.js"></script>
    <!-- toast.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- AdminLTE App -->
    <script src="views/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="views/dist/js/pages/dashboard.js"></script>
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    <script>
      $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
          'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
          'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
          format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
          icons: {
            time: 'far fa-clock'
          }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'MM/DD/YYYY hh:mm A'
          }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          },
          function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
          $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
          $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

      })
      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })

      // DropzoneJS Demo Code Start
      Dropzone.autoDiscover = false

      // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
      var previewNode = document.querySelector("#template")
      previewNode.id = ""
      var previewTemplate = previewNode.parentNode.innerHTML
      previewNode.parentNode.removeChild(previewNode)

      var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
      })

      myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
          myDropzone.enqueueFile(file)
        }
      })

      // Update the total progress bar
      myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
      })

      myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
      })

      // Hide the total progress bar when nothing's uploading anymore
      myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
      })

      // Setup the buttons for all transfers
      // The "add files" button doesn't need to be setup because the config
      // `clickable` has already been specified.
      document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
      }
      document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
      }
      // DropzoneJS Demo Code End

      // password generator script
      function generateRandomPassword(length) {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
        let password = "";
        for (let i = 0; i < length; i++) {
          password += charset.charAt(Math.floor(Math.random() * charset.length));
        }
        return password;
      }

      function fillPasswordInput(inputId, length) {
        const password = generateRandomPassword(length);
        document.getElementById(inputId).value = password;
      }
    </script>


  </body>

  </html>