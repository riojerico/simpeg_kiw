<?php
include "../koneksi/koneksi.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan pegawai.xls");
?>
        
          <table border="1" align="center" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th width="15" align="center"><strong><center>No</center></strong></th>
                <th width="100" align="center"><strong><center>Nip</center></strong></th>
                <th width="200" align="center"><strong><center>Nama</center></strong></th>
                <th width="100" align="center"><strong><center>Jabatan</center></strong></th>
                <th width="100" align="center"><strong><center>Pendidikan</center></strong></th>
                <th width="100" align="center"><strong><center>Status</center></strong></th>
                <th width="70" align="center"><strong><center>Umur</center></strong></th>        
              </tr>
            </thead>

              <?php
              $q=mysql_query("select * from view_datapegawai_pendidikan order by jabatan ");
              while($data=mysql_fetch_array($q)){
              $no++;

              $getjabatan=$data['jabatan'];
              $getjabatan2=mysql_fetch_array(mysql_query("select jenis_jabatan from jenis_jabatan where id='$getjabatan' "));

              $getpdd=$data['tingkat'];
              $getpdd2=mysql_fetch_array(mysql_query("select pendidikan from jenjang_pendidikan where id='$getpdd' "));

              $status=$data['status_peg'];
              $status2=mysql_fetch_array(mysql_query("select status_pegawai from master_statuspegawai where id='$status' "));

              ?>
              <tr>
                <td align="center"><?php echo $no ?></td>
                <td align="center"><?php echo $data['nip'] ?></td>
                <td align="center"><?php echo $data['gelar_depan'];echo'  ';echo $data['nama'];echo'  ';echo $data['gelar_belakang'] ?></td>
                <td align="center"><?php echo $getjabatan2[0] ?></td>
                <td align="center"><?php echo $getpdd2[0] ?></td>
                <td align="center"><?php echo $status2[0] ?></td>
                <td align="center"><?php echo $data['umur'] ?> Tahun</td>
              </tr> 

            <?php
            }
            ?>  
          </table>