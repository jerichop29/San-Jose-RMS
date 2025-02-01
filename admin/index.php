<?php
    session_start();
    include "../home/db/connection.php";
    include "function/function_get.php";
    $datetoday = date("Y-m-d");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resort Management System</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/corey.css">
    <link rel="stylesheet" href="css/skin-green-light.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="css/buttons.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/toastr.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/dataTables.responsive.min.js"></script>
    <script src="js/responsive.bootstrap4.min.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <!-- <script src="js/buttons.bootstrap4.min.js"></script> -->
    <script src="js/toastr.min.js"></script>
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php include "shared/header.php"?>
  <!-- sidebar -->
  <?php include "shared/sidebar.php"?>

  <div class="content-wrapper" style="min-height: 1010px;">
    
  <!-- DASHBOARD PAGE -->
  <?php include "view/dashboard.php"?>
  <!-- COTTAGE/HALL PAGE -->
  <?php include "view/cottage.php"?>
  <!-- RESERVATION PAGE -->
  <?php include "view/reservation.php"?>
  <!-- FEATURES PAGE -->
  <?php include "view/features.php"?>
  <!-- PICTURES PAGE -->
  <?php include "view/pictures.php"?>
  <!-- WALK IN PAGE -->
  <?php include "view/walkin.php"?>
  <!-- USERS ACCOUNT PAGE -->
  <?php include "view/users.php"?>
  <!-- USERS ACCOUNT PAGE -->
  <?php include "view/feedback.php"?>

  </div>

  <!-- Main Footer -->
  <?php include "shared/footer.php"?>

</div>
<!-- ./wrapper -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .row .col-sm-6:eq(0)');
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

   //TOASTER
   <?php
    if (isset($_SESSION["notify"])) {
        if ($_SESSION["notify"]=="success-add") {?>
            toastr.success('Data successfully added.', 'Success Add!', 
            {positionClass: 'toast-bottom-right',
                timeOut: 5000,  
                titleClass: 'toast-title',   
                messageClass: 'toast-message', 
                target: 'body',
                newestOnTop: true,
                preventDuplicates: false,
                progressBar: true
            })
        <?php }
        if ($_SESSION["notify"]=="success-delete") {?>
            toastr.success('Data successfully deleted.', 'Success Delete!', 
            {positionClass: 'toast-bottom-right',
                timeOut: 5000,  
                titleClass: 'toast-title',   
                messageClass: 'toast-message', 
                target: 'body',
                newestOnTop: true,
                preventDuplicates: false,
                progressBar: true
            })
        <?php }
        if ($_SESSION["notify"]=="failed-add") {?>
          toastr.error('Failed to add.', 'Failed!', 
          {positionClass: 'toast-bottom-right',
              timeOut: 5000,  
              titleClass: 'toast-title',   
              messageClass: 'toast-message', 
              target: 'body',
              newestOnTop: true,
              preventDuplicates: false,
              progressBar: true
          })
      <?php }
      if ($_SESSION["notify"]=="confirm") {?>
        toastr.success('Success confirm.', 'Confirmed!', 
        {positionClass: 'toast-bottom-right',
            timeOut: 5000,  
            titleClass: 'toast-title',   
            messageClass: 'toast-message', 
            target: 'body',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true
        })
    <?php }
    if ($_SESSION["notify"]=="failed-adds") {?>
        toastr.error('Failed to Confirm.', 'Failed!', 
        {positionClass: 'toast-bottom-right',
            timeOut: 5000,  
            titleClass: 'toast-title',   
            messageClass: 'toast-message', 
            target: 'body',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true
        })
    <?php }
    if ($_SESSION["notify"]=="cancel") {?>
        toastr.success('Success cancel.', 'Canceled!', 
        {positionClass: 'toast-bottom-right',
            timeOut: 5000,  
            titleClass: 'toast-title',   
            messageClass: 'toast-message', 
            target: 'body',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true
        })
    <?php }
    if ($_SESSION["notify"]=="cancel-failed") {?>
        toastr.error('Failed to cancel.', 'Failed!', 
        {positionClass: 'toast-bottom-right',
            timeOut: 5000,  
            titleClass: 'toast-title',   
            messageClass: 'toast-message', 
            target: 'body',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true
        })
    <?php }
    if ($_SESSION["notify"]=="failed") {?>
        toastr.error('', 'Failed!', 
        {positionClass: 'toast-bottom-right',
            timeOut: 5000,  
            titleClass: 'toast-title',   
            messageClass: 'toast-message', 
            target: 'body',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true
        })
    <?php }
    if ($_SESSION["notify"]=="success") {?>
        toastr.success('', 'Success!', 
        {positionClass: 'toast-bottom-right',
            timeOut: 5000,  
            titleClass: 'toast-title',   
            messageClass: 'toast-message', 
            target: 'body',
            newestOnTop: true,
            preventDuplicates: false,
            progressBar: true
        })
    <?php }
    if ($_SESSION["notify"]=="paid") {?>
      toastr.success('', 'Fullypaid!', 
      {positionClass: 'toast-bottom-right',
          timeOut: 6000,  
          titleClass: 'toast-title',   
          messageClass: 'toast-message', 
          target: 'body',
          newestOnTop: true,
          preventDuplicates: false,
          progressBar: true
      })
  <?php }
   unset($_SESSION["notify"]); }
   ?>

    $(".btn-check").on("click", function name(params) {
            $.ajax({
                method: "POST",
                url: "function/get_res.php",
                data: $("#check-avail-form").serialize(),
                cache: false,
                timeOut: 5000,
                beforeSend: function name(params) {
                    $(".btn-check").text("Checking Please wait...")
                },
                success: function (result) {
                    $(".res").html(result);
                    $(".btn-check").text("Check Availability")
                }
            })
        })

    $("body").on("click",".view", function (e) {
    e.preventDefault();
    let res_id = $(this).attr("id");
    $.ajax({
        url: "function/view.php",
        type: "POST",
        data: {res_id: res_id},
        cache: false,
        success: function (result) {
        $("div#view-reserve").html(result);
        }
        });
    });
  
    $(".btnhide").on("click", function () {
    $(".hideme").modal('hide');
    })


 
  });
</script>
</body>
</html>