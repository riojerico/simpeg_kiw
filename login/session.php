<?php
error_reporting(0);
// Membangun Koneksi dengan Server dengan nama server, user_id dan password sebagai parameter
$connection = mysql_connect("localhost", "root", "");
// Seleksi Database
$db = mysql_select_db("simpeg", $connection);
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama user berdasarkan username user dengan mysql_fetch_assoc
$ses_sql=mysql_query("select nip from login where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['nip'];
if(!isset($login_session)){
	mysql_close($connection); // Menutup koneksi
	header('Location: ../dashboard.php'); // Mengarahkan ke Home Page
}
?>
