<!-- hapus modal -->
    <div class="modal fade" id="modalHapus<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $data['id']; ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel<?php echo $data['id']; ?>"><center>Apakah Anda Yakin? </center></h4>
          </div>
          <div class="modal-body">

            <center>
            <span>  <button type="button" class="btn btn-defaut" data-dismiss="modal">Batal</button></span>
            <span>  <a href="../crud/dataPegawaiSimpan.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Delete" name="Delete" class="btn btn-danger">Hapus</button></a></span>
            </center>

          </div>

        </div>
      </div>
    </div>