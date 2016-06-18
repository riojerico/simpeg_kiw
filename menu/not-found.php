
<?php
include "../layout/layout-header.php";
?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
include "../layout/layout-sidebartop.php";
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Error Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">File</a></li>
        <li class="active">error</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h3 class="headline text-yellow"> </h3>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! File not found.</h3>

          <p>
            Kami tidak menemukan file yang Anda cari.
           
          </p>

        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>

<?php
include "../layout/layout-footer.php";
include "../layout/layout-sidebar.php";
include "../layout/layout-js.php";
 ?>
