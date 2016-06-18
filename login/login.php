<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include "../koneksi/koneksi.php";

$kirim=$_REQUEST['submit'];
if(!$kirim)
{
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>

        <link rel="stylesheet" href="css/style.css">
				<script src="../bootstrap/js/jquery.validate.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">
		<style media="screen">
		body {
			background:url(grey.jpg) no-repeat center center fixed;
			/*background-color: #2c3338;*/
		   -webkit-background-size: cover;
		   -moz-background-size: cover;
		   -o-background-size: cover;
		   background-size: cover;

			color: #606468;
			font: 400 0.875rem/1.5 "Open Sans", sans-serif;
			margin: 0;
			min-height: 100% 100%;
		}
		</style>

  </head>
<body class="align">

  <div class="site__container">

    <div class="grid__container">
		<div class="label">
			<?php echo $error ?>
		</div>
      <form action="login.php" id="form1" name="form1" method="post" class="form form--login">

        <div class="form__field">
          <label class="fa fa-user" for="username"><span class="hidden">Username</span></label>
          <input id="username" name="username" type="text" class="form__input" placeholder="Username" required>
        </div>

        <div class="form__field">
          <label class="fa fa-lock" for="password"><span class="hidden">Password</span></label>
          <input id="password" name="password" type="password" class="form__input" placeholder="Password" required>
        </div>

        <div class="form__field">
          <input id="submit" name="submit" type="submit" value="Sign In">
        </div>

      </form>

     <!--  <p class="text--center">Belum memiliki akun? <a href="#">Request</a> <span class="fontawesome-arrow-right"></span></p> -->

    </div>

  </div>
</body>
</html>
<?php
}

else {

  $username=$_POST['username'];
  $password=md5($_POST['password']);

  $perintah="select * from login where username='$username' and password='$password'";
  $hasil=mysql_query($perintah);
  $hasil2=mysql_fetch_array($hasil);
  if($hasil2)
  { 
      //echo $perintah;
      $_SESSION['username']=$username;
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../dashboard/admin.php">';
  }
  else
  {
    //echo $perintah;
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
  }
} 