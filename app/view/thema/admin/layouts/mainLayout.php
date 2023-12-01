<?php 

if(!Application::$app->auth->checkLogin())

    header("Location:".SITEADRESS."login");



?>

<!DOCTYPE html>

<html lang="tr">



<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>CMGTeknik Yönetim </title>

  <?php require(__DIR__."/../../../../../system/basehref.php");?>

  <!-- plugins:css -->

  <link rel="stylesheet" href="content/feather/feather.css">

  <link rel="stylesheet" href="content/mdi/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="content/ti-icons/css/themify-icons.css">

  <link rel="stylesheet" href="content/typicons/typicons.css">

  <link rel="stylesheet" href="content/simple-line-icons/css/simple-line-icons.css">

  <link rel="stylesheet" href="content/vendor.bundle.base.css">

  <!-- endinject -->

  <!-- Plugin css for this page -->

  <!-- <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->

  <link rel="stylesheet" href="scripts/select.dataTables.min.css">

  <!-- End plugin css for this page -->

  <!-- inject:css -->

  <link rel="stylesheet" href="content/vertical-layout-light/style.css">

  <!-- endinject -->

  <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">



  <style>

    /* label, input { display:block; }

    input.text { margin-bottom:12px; width:95%; padding: .4em; } */

    /* fieldset { padding:0; border:0; margin-top:25px; }

    h1 { font-size: 1.2em; margin: .6em 0; } */

    div#users-contain { width: 350px; margin: 20px 0; }

    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }

    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }

    .ui-dialog .ui-state-error { padding: .3em; }

    .validateTips { border: 1px solid transparent; padding: 0.3em; }

    .ui-draggable, .ui-droppable {

	background-position: top;

  }

  </style>

</head>

<body>

  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->

    <?php require __DIR__.'/../partials/_navbar.php';?>

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->

      <?php require __DIR__.'/../partials/_settings-panel.php';?>

      <!-- partial -->

      <!-- partial:partials/_sidebar.html -->

      <?php require __DIR__.'/../partials/_sidebar.php';?>

      <!-- partial -->

      <div class="main-panel">

        <div class="content-wrapper">

          {{Content}}

        </div>

        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->

        <?php require __DIR__.'/../partials/_footer.php';?>

        <!-- partial -->

      </div>

      <!-- main-panel ends -->

    </div>

    <!-- page-body-wrapper ends -->

  </div>

  <!-- container-scroller -->



  <!-- plugins:js -->

  <script src="scripts/vendor.bundle.base.js"></script>

  <!-- endinject -->

  <!-- Plugin js for this page -->

  <script src="scripts/Chart.min.js"></script>

  <!-- <script src="scripts/bootstrap-datepicker.min.js"></script> -->

  <script src="scripts/progressbar.min.js"></script>



  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->

  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <!-- End plugin js for this page -->

  <!-- inject:js -->

  <script src="scripts/off-canvas.js"></script>

  <script src="scripts/hoverable-collapse.js"></script>

  <script src="scripts/template.js"></script>

  <script src="scripts/settings.js"></script>

  <script src="scripts/todolist.js"></script>

  <!-- endinject -->

  <!-- Custom js for this page-->

  <script src="scripts/jquery.cookie.js" type="text/javascript"></script>

  <script src="scripts/dashboard.js"></script>

  <script src="scripts/Chart.roundedBarCharts.js"></script>

  <script src="scripts/file-upload.js"></script>

  <script src="scripts/select2.js"></script>

  <script src="scripts/typeahead.js"></script>

  <script src="scripts/adminMain.js"></script>

  <!-- End custom js for this page-->



</body>



</html>



