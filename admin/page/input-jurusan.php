<?php
  $hasil ="";
  include 'includes/hapus.php';
?>
<div class="container mt-4 col-xs-4">
  <div class="card">
    <div class="card-header">
      Input Data Jurusan 
    </div>
    <div class="card-body">
      <?php
        echo $hasil;
      ?>
      <form method="POST" action="includes/simpan-jurusan.php">
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationDefault02">Nama Jurusan</label>
            <input class="form-control" id="validationDefault02" placeholder="Input Nama Jurusan" name="nama_jurusan" required="" type="text">
          </div>
          <div class="col-md-8 mb-3">
            <label for="validationDefault02">Ketua Jurusan</label>
            <input class="form-control" id="validationDefault02" placeholder="Input Ketua Jurusan" name="ketua_jurusan" required="" type="text">
          </div>
        </div>
        <input type="submit" name="simpan-jurusan" value="Simpan Data Jurusan" class="btn btn-primary">
      </form>
    </div>
    <div class="card-footer text-muted">
      <i>Pastikan data yang anda input telah benar sebelum menyimpan data.</i>
    </div>
  </div>
</div>
<br>
<div class="row">
    <div class="container col-xs-8 col-sm-8 col-md-182 col-lg-8 col-xl-8">     
      <div class="card mb-3">
        <div class="card-header">
          <h3><i class="fa fa-users"></i> Data Jurusan</h3><br>
		    <a href="page/cetak-jurusan.php" target="_Blank" class="btn btn-info btn-sm" data-toggle="tooltip"><i class="fa fa-print"></i> Cetak Data Jurusan</a>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Ketua Jurusan</th>
                <th>Aksi</th>
              </tr>
            </thead> 
            <?php
              $sql = "SELECT * FROM tb_jurusan";
              $query = mysqli_query($db, $sql);
            ?>                         
            <tbody>
              <?php
                $x=0;
                while($ambil_data = mysqli_fetch_array($query)){
                $x++;
              ?>
              <tr>
                <td><center><?php echo $x ?></center></td>
                <td><?php echo $ambil_data['nama_jurusan'] ?></td>
                <td><?php echo $ambil_data['ketua_jurusan'] ?></td>
                <td align="center">
                  <a href="javascript:;" data-id="<?php echo $ambil_data['nama_jurusan'] ?>" data-toggle="modal" data-target="#hapus-jurusan" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
          
        </div>                            
      </div><!-- end card-->          
    </div>
</div>

<!-- Modals Hapus -->
      <!-- Modals Hapus Data -->
    <div id="hapus-jurusan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <strong> Apakah Anda yakin ingin menghapus data ini ? <br> </strong>
        </div>
        <div class="modal-footer">
          <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
        </div>
        </div>
      </div>
    </div>
     <!-- End Modals -->
<!-- End Modals -->