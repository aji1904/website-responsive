<?php
  $hasil ="";
  include 'includes/hapus.php';
  include 'includes/simpan-konseling.php';
  echo $hasil;
?>
<div class="container mt-3">
  <div class="card">
    <div class="card-header">
      Input Data Konseling
    </div>
    <div class="card-body">
      <?php
        echo $hasil;
      ?>
      <form method="POST" action="">
        <div class="form-row">
		<div class="col-md-3 mb-3">
            <label for="siswa">NIS Siswa</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"><i>NIS</i></label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="nis" required="">
                <option selected="selected">Choose...</option>
                <?php
                  $sql_siswa = "SELECT * FROM tb_siswa";
                  $query_siswa = mysqli_query($db, $sql_siswa);
                  while($ambil_siswa = mysqli_fetch_assoc($query_siswa)){
                ?>
                <option value="<?php echo $ambil_siswa['nis']; ?>"><?php echo $ambil_siswa['nama']; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-5 mb-3">
            <label for="validationDefault02">Keterangan</label>
            <input class="form-control" id="validationDefault02" placeholder="Keterangan" name="keterangan" required="" type="text">
          </div>
		  <div class="col-md-4 mb-3">
            <label for="bid_bimbingan">Bidang Bimbingan</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"><i>Bidang Bimbingan</i></label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="bid_bimbingan" required="">
                <option selected="selected">Pilih Bidang Bimbingan...</option>
                <option value="Pribadi">Pribadi</option>
                <option value="Sosial">Sosial</option>
                <option value="Pribadi&Sosial">Pribadi&Sosial</option>
              </select>
            </div>
          </div>
		  <div class="col-md-4 mb-3">
            <label for="tindak_lanjut">Tindak Lanjut</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"><i>Tindak Lanjut</i></label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="tindak_lanjut" required="">
                <option selected="selected">Pilih Tindak Lanjut...</option>
                <option value="Pembinaan">Pembinaan</option>
                <option value="Surat Panggilan">Surat Panggilan</option>
              </select>
            </div>
          </div>
        </div>
        <button class="btn btn-primary" name="simpan-konseling">Simpan Data Konseling</button>
      </form>
    </div>
    <div class="card-footer text-muted">
      <i>Pastikan data yang anda input telah benar sebelum menyimpan data.</i>
    </div>
  </div>
</div>
<br>
<div class="row">
	<div class="card-header">
		<a href="page/cetak-konseling1.php" target="_Blank" class="btn btn-info btn-sm" data-toggle="tooltip"><i class="fa fa-print"></i> Cetak Data Konseling</a>
	</div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">     
      <div class="card mb-3">
        <div class="card-header">
          <h3><i class="fa fa-users"></i> Data Konseling</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Keterangan</th>
                <th>Bidang Bimbingan</th>
                <th>Tindak Lanjut</th>
                <th><center>Aksi</center></th>
              </tr>
            </thead> 
            <?php
              $sql = "SELECT * FROM tb_konseling JOIN tb_siswa ON tb_siswa.nis = tb_konseling.nis
					JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas";
              $query = mysqli_query($db, $sql);
              echo mysqli_error($db);
            ?>                         
            <tbody>
              <?php
                $x=0;
                while($ambil_data = mysqli_fetch_array($query)){
                $x++;
              ?>
              <tr>
                <td><center><?php echo $x ?></center></td>
                <td><?php echo $ambil_data['nama'] ?></td>
                <td><?php echo $ambil_data['nama_kelas'] ?></td>
                <td><?php echo $ambil_data['keterangan'] ?></td>
                <td><?php echo $ambil_data['bid_bimbingan'] ?></td>
                <td><?php echo $ambil_data['tindak_lanjut'] ?></td>
                <td align="center">
                  <a href="javascript:;" data-id="<?php echo $ambil_data['id_konseling'] ?>" data-toggle="modal" data-target="#hapus-konseling" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                  <a href="index.php?p=edit-konseling&id=<?= $ambil_data['id_konseling']?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                  <a href="page/cetak-konseling.php?id=<?= $ambil_data['id_konseling']?>" target="_BLANK" class="btn btn-success"><i class="fa fa-print"></i></a>
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
    <div id="hapus-konseling" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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