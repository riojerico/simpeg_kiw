
<?php
include "../layout/layout-header.php";
?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
include "../layout/layout-sidebartop.php";
include "../layout/layout-content.php";
include "../layout/layout-footer.php";
include "../layout/layout-sidebar.php";
include "../layout/layout-js.php";
 ?>


 <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript">
          $(document).ready(function(){
              $("#search").autocomplete({
                  source: "<?php echo 'data.php';?>"
              });
          });
  </script>
