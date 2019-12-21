<?php
  $hasil ="";
  include 'includes/hapus.php';
  include 'includes/simpan-kelas.php';
?>
<div class="container mt-3">
  <div class="card">
    <div class="card-header">
      Input Data Kelas
    </div>
    <div class="card-body">
      <form method="POST" action="includes/simpan-kelas.php">
        <?php
        echo $hasil;
      ?>
        <div class="form-row">
         <div class="col-md-6 mb-3">
            <label for="Jurusan">Nama Jurusan</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"><i>Jurusan</i></label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="nama_jurusan" required="">
                <option selected="selected">Choose...</option>
                <?php
                  $sql_jurusan = "SELECT * FROM tb_jurusan";
                  $query_jurusan = mysqli_query($db, $sql_jurusan);
                  while($ambil_jurusan = mysqli_fetch_assoc($query_jurusan)){
                ?>
                <option value="<?php echo $ambil_jurusan['id_jurusan']; ?>"><?php echo $ambil_jurusan['nama_jurusan']; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationDefault02">Nama Kelas</label>
            <input class="form-control" id="validationDefault02" placeholder="Nama Kelas" name="nama_kelas" required="" type="text">
          </div>
          <div class="col-md-6 mb-3">
            <label for="wali_kelas">Wali Kelas</label>
            <input  class="form-control" name="wali_kelas" placeholder="Wali Kelas" required="" />
          </div>
          <div class="col-md-6 mb-3">
            <label for="wali_kelas">NIP Wali Kelas</label>
            <input  class="form-control" name="nip_wali" placeholder="NIP Wali Kelas" required="" />
          </div>
        </div>
        <input type="submit" name="simpan" value="Simpan Data Kelas" class="btn btn-primary">
      </form>
    </div>
    <div class="card-footer text-muted">
      <i>Pastikan data yang anda input telah benar sebelum menyimpan data.</i>
    </div>
  </div>
</div>
<br>
<div class="row">
    <div class="container col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">     
      <div class="card mb-3">
        <div class="card-header">
          <h3><i class="fa fa-users"></i>Data Kelas</h3><br>
		  <a href="page/cetak-kelas.php" target="_Blank" class="btn btn-info btn-sm" data-toggle="tooltip"><i class="fa fa-print"></i> Cetak Data Kelas</a>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas </th>
                <th>Aksi</th>
              </tr>
            </thead> 
            <?php
              $sql = "SELECT * FROM tb_kelas JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_kelas.id_jurusan";
              $query = mysqli_query($db, $sql);
            ?>                         
            <tbody>
              <?php
                $x=0;
                while($ambil_data = mysqli_fetch_array($query)){
                $x++;
              ?>
              <tr>
                <td><?php echo $x ?></td>
                <td><?php echo $ambil_data['nama_jurusan'] ?></td>
                <td><?php echo $ambil_data['nama_kelas'] ?></td>
                <td><?php echo $ambil_data['wali_kelas'] ?></td>
                <td align="center">
                  <a href="javascript:;" data-id="<?php echo $ambil_data['nama_kelas'] ?>" data-toggle="modal" data-target="#hapus-kelas" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
    <div id="hapus-kelas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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