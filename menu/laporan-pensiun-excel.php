<?php
//$id=$_GET['id'];

include "../koneksi/koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan urut kepangkatan.xls");
?>
	<h2 align="center" class="l1">Pensiun Tahun <?php echo date(Y) ?></h2>
	<hr class="l2">`
	<h3 align="center"></h3>

		  <table border="1" align="center" class="table table-bordered table-striped">
    <thead>
      <tr>

        <th width="15" align="center"><strong><center>No</center></strong></th>
        <th width="100" align="center"><strong><center>Nip</center></strong></th>
        <th width="120" align="center"><strong><center>Nama</center></strong></th>
        <th width="100" align="center"><strong><center>Jabatan</center></strong></th>
        <th width="100" align="center"><strong><center>Status</center></strong></th>
        <th width="70" align="center"><strong><center>Umur</center></strong></th>        
      </tr>
    </thead>

      <?php
      $getpensiun=mysql_fetch_array(mysql_query("select usia from usia_pensiun"));
      $getpensiun2=$getpensiun[0]-1;

      $q=mysql_query("select * from view_datapegawai_update where umur >='$getpensiun2' ");
      while($data=mysql_fetch_array($q)){
      $no++;

      $getjabatan=$data['jabatan'];
      $getjabatan2=mysql_fetch_array(mysql_query("select jenis_jabatan from jenis_jabatan where id='$getjabatan' "));

      $status=$data['status_peg'];
      $status2=mysql_fetch_array(mysql_query("select status_pegawai from master_statuspegawai where id='$status' "));

      ?>
      <tr>
        <td align="center"><?php echo $no ?></td>
        <td align="center"><?php echo $data['nip'] ?></td>
        <td align="center"><?php echo $data['gelar_depan'];echo'  ';echo $data['nama'];echo'  ';echo $data['gelar_belakang'] ?></td>
        <td align="center"><?php echo $getjabatan2[0] ?></td>
        <td align="center"><?php echo $status2[0] ?></td>
        <td align="center"><?php echo $data['umur'] ?> Tahun</td>
      </tr> 

    <?php
    }
    ?>  
  </table>