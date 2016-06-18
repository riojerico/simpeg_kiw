
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


<!-- ./wrapper -->
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<script src="../bootstrap/js/ajax_kota.js"></script>

<script src="../bootstrap/js/jsku.js"></script>

<script src="../bootstrap/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir2").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php
$data_pegawai2 = mysql_query('select * from data_pegawai');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_masuk<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_pengangkatan<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>
<?php
$data_pegawai2 = mysql_query('select * from dk_anak');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>
<?php
$data_pegawai2 = mysql_query('select * from dk_istrisuami');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>
<?php
$data_pegawai2 = mysql_query('select * from dk_istrisuami');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir2_<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>
<?php
$data_pegawai2 = mysql_query('select * from dk_orangtua');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>
<?php
$data_pegawai2 = mysql_query('select * from rwt_jabatan');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_pendidikan');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_pelatihan');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_penghargaan');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_seminar');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_organisasi');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_gajipokok');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_hukuman');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_teguran');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<?php
$data_pegawai2 = mysql_query('select * from rwt_dp3');
        while($data2 = mysql_fetch_array($data_pegawai2)){
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal_lahir<?php echo $data2['id']; ?>").datepicker({
                    dateFormat : "dd/mm/yy",
                    changeMonth : true,
                    changeYear : true
                });
            });
</script>
<?php } ?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) dashboard.js MARAKE DATA TABLE RAKISO-->
<!-- Data Tables -->

<script type="text/javascript" src="../bootstrap/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
$(function() {
    $('#data').DataTable( {
              "bJQueryUI":true,
              "bPaginate":true,
              "sPaginationType": "full_numbers",
              "iDisplayLength":10
    } );

} );
</script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script>

<script language='JavaScript'>var ajaxRequest;
function getAjax() //fungsi untuk mengecek AJAX pada browser
{
try
{
ajaxRequest = new XMLHttpRequest();
}
catch (e)
{
try
{
ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
try
{
ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
alert("Your browser broke!");
return false;
}
}
}
}function autoComplete() //fungsi menangkap input search dan menampilkan hasil search
{
getAjax();
input = document.getElementById('nama').value;if (input == "")
{
document.getElementById("hasil").innerHTML = "";
}
else
{
ajaxRequest.open("GET","laporan-riwayat-pilihan-search.php?input="+input);
ajaxRequest.onreadystatechange = function()
{
document.getElementById("hasil").innerHTML = ajaxRequest.responseText;
}
ajaxRequest.send(null);
}
}function autoInsert(nip, nama, id_peg) //fungsi mengisi input text dengan hasil pencarian yang dipilih
{
document.getElementById("nip").value = nip;
document.getElementById("nama").value = nama;
document.getElementById("id_peg").value = id_peg;
document.getElementById("hasil").innerHTML = "";
}
</script>
<script src="../assets/jquery-number-master/jquery.number.min.js"></script>
<script type="text/javascript">
  $('input.price').number( true, 0 );
</script>


</body>
</html>
