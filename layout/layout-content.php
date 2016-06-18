<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Marketing</span>
              <span class="info-box-number">
                <?php 
              $pegawai=mysql_query("select count(id) from view_datapegawai_update where jabatan='7'");
              $pegawai2=mysql_fetch_row($pegawai);
              echo $pegawai2[0];
              ?>
               <small>orang</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pegawai Laki-laki</span>
              <span class="info-box-number">
              <?php 
              $pegawai=mysql_query("select count(id) from data_pegawai where jenis_kelamin='1'");
              $pegawai2=mysql_fetch_row($pegawai);
              echo $pegawai2[0];
              ?> 
              <small>orang</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pegawai Perempuan</span>
              <span class="info-box-number">
                 <?php 
              $pegawai=mysql_query("select count(id) from data_pegawai where jenis_kelamin='2'");
              $pegawai2=mysql_fetch_row($pegawai);
              echo $pegawai2[0];
              ?> 
               <small>orang</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Members</span>
              <span class="info-box-number">
                 <?php 
              $pegawai=mysql_query("select count(id) from data_pegawai ");
              $pegawai2=mysql_fetch_row($pegawai);
              echo $pegawai2[0];
              ?> 
              <small>orang</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <ul class="nav nav-tabs pull-right">
            <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
            <li><a href="#sales-chart" data-toggle="tab">Donut</a></li> -->
            <li class="pull-left header"><i class="fa fa-inbox"></i> Search Pegawai</li>
          </ul>
          <div class="tab-content no-padding">
            <!-- Morris chart - Sales -->
            <br>

            <form class="" action="../menu/data-pegawai-search.php" method="post">


            <label for="satuan" class="col-sm-4 control-label">Pegawai</label>
            <div class="col-sm-7">
              <input  type="text" id="search" class="form-control" name="term" placeholder="Masukkan Nama Pegawai" value=""><br>
            </div>

            <!-- <label for="satuan" class="col-lg-4 control-label">Jenis Kelamin</label>
            <div class="col-lg-7">
              <select name="status" class="form-control"> <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="istri">Laki-laki</option>
                                                        <option value="suami">Perempuan</option>
              </select><br>
            </div>

            <label for="satuan" class="col-lg-4 control-label">Agama</label>
            <div class="col-lg-7">
              <select name="status" class="form-control"> <option value="">Pilih Agama</option>
                <?php
                  $q=mysql_query("select * from agama");
                  while($q2=mysql_fetch_array($q)){
                ?>
                <option value="<?php echo $q2[0] ?>"><?php echo $q2[1] ?></option>
                <?php }
                ?>
              </select><br>
            </div>

            <label for="satuan" class="col-lg-4 control-label">Usia Pegawai</label>
            <div class="col-lg-3">
              <input name="usiaA" class="form-control" value="<?php echo $data['pekerjaan']; ?>">
            </div>
<div class="col-lg-1">
  s/d
</div>

            <div class="col-lg-3">
              <input name="usiaZ" class="form-control" value="<?php echo $data['pekerjaan']; ?>"><br>
            </div>

            <label for="satuan" class="col-lg-4 control-label">Pangkat / Golongan</label>
            <div class="col-sm-7">
              <input  type="text" class="form-control" name="pangkat" placeholder="Masukkan Pangkat / Golongan" value="<?php echo $data['pekerjaan']; ?>"><br>
            </div>

            <label for="satuan" class="col-lg-4 control-label">Pendidikan</label>
            <div class="col-lg-7">
              <select name="status" class="form-control"> <option value="">Pilih Pendidikan</option>
                <?php
                  $q=mysql_query("select * from jenjang_pendidikan");
                  while($q2=mysql_fetch_array($q)){
                ?>
                <option value="<?php echo $q2[0] ?>"><?php echo $q2[2] ?></option>
                <?php }
                ?>
              </select><br>
            </div>

            <label for="satuan" class="col-lg-4 control-label">Status Pernikahan</label>
            <div class="col-lg-7">
              <select name="status" class="form-control"> <option value="">Pilih Status Pernikahan</option>
                <?php
                  $q=mysql_query("select * from status_pernikahan");
                  while($q2=mysql_fetch_array($q)){
                ?>
                <option value="<?php echo $q2[0] ?>"><?php echo $q2[1] ?></option>
                <?php }
                ?>
              </select><br>
            </div> -->

            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 10px;"></div>
            <div class="box-footer" align="center">

               <button type="submit" value="Edit" name="Edit" class="btn btn-primary"><span class="fa fa-search-plus"></span> Filter</button>
            </div>
          </form>
          </div>

        </div>
        <!-- /.nav-tabs-custom -->

      </section>
      <!-- right col -->



      <section class="col-lg-6 connectedSortable">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-fw fa-birthday-cake"></i> Pegawai Yang Berulang Tahun Hari Ini</h3>

            <!-- <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div> -->
          </div>
        <div class="box-body">
           <ul class="products-list product-list-in-box">
            <?php
            $ulangtahun=date("m-d");
            $cekultah=mysql_query("select * from data_pegawai where tanggal_lahir like '%$ulangtahun%' limit 20");
            $cekultah2=mysql_fetch_array($cekultah);
            if($cekultah2=="")
            {
             echo "Tidak ada pegawai yang berulang tahun hari ini";
           }else{

            $ulangtahun2=mysql_query("select * from data_pegawai where tanggal_lahir like '%$ulangtahun%' limit 20");
            while($ulangtahun3=mysql_fetch_array($ulangtahun2)){

            ?>

            <li class="item">
              <div class="product-img">
                <?php
                //DEFAULT FOTO JIKA KOSONG//
                  if($ulangtahun3['foto']=="../assets/images/" || $ulangtahun3['foto']=="")
                    $foto = "../assets/images/an.jpg";
                  else
                    $foto = $ulangtahun3['foto'];
                ?>
                <a class="thumbnail">                  
                <img src="<?php echo $foto ?>" width="150" height="200" class="img-responsive"></a>
              </div>
              <div class="product-info">
                <a href="javascript::;" class="product-title ulku4"><?php echo $ulangtahun3['nama'] ?>
                  <span class="label label-warning pull-right ulku4">
                  <?php
                    $viewdate1 = date("Y", strtotime($ulangtahun3['tanggal_lahir']));
                    $viewdate2 = date("Y");
                    echo $viewdate3 = $viewdate2 - $viewdate1;
                  ?> Thn  
                  </span></a>
                    <span class="product-description ulku4">
                      <?php echo date("d M Y", strtotime($ulangtahun3['tanggal_lahir']))?>
                    </span>
              </div>
            </li>
            <?php
          }
        }

            ?>
          </ul>
        </div>
      </div>
      </section>
    </div>
  </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
