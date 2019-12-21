<?php
  $hasil ="";
  include 'includes/hapus.php';
?>
<div class="container mt-3">
  <div class="card">
    <div class="card-header">
      Input Data Siswa
    </div>
    <div class="card-body">
      <form method="POST" action="includes/simpan-siswa.php">
        <?php
          echo $hasil;
        ?>
        <div class="form-row">
          <div class="col-md-3 mb-3">
            <label for="validationDefault02">NIS</label>
            <input class="form-control" id="validationDefault02" placeholder="NIS" name="nis" required="" type="text"/>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault02">Nama</label>
            <input class="form-control" id="validationDefault02" placeholder="Nama" name="nama" required="" type="text" />
          </div>
          <div class="col-md-3 mb-3">
            <label for="nama_phl">Tempat Lahir</label>
            <input id="datepicker" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required="" type="text"/>
          </div>
		  <div class="col-md-3 mb-3">
            <label for="nama_phl">Tanggal Lahir</label>
            <input id="datepicker"	class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required=""  type="date" />
          </div>
           <div class="col-md-3 mb-3">
            <label for="validationDefault02">Alamat</label>
            <input class="form-control" id="validationDefault02" placeholder="Alamat" name="alamat" required="" type="text" />
          </div>
		  <div class="col-md-3 mb-3">
            <label for="JK">Jenis Kelamin</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"><i>JK</i></label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="jk" required="">
                <option selected="selected">Choose...</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
		   <div class="col-md-3 mb-3">
            <label for="validationDefault02">No Telp</label>
            <input class="form-control" id="validationDefault02" placeholder="Nomor Telp" name="no_hp" required="" type="text" />
          </div>
		  <div class="col-md-4 mb-3">
            <label for="Kelas">Kelas</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"><i>Kelas</i></label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="nama_kelas" required="">
                <option selected="selected">Choose...</option>
                <?php
                  $sql_kelas = "SELECT * FROM tb_kelas";
                  $query_kelas = mysqli_query($db, $sql_kelas);
                  while($ambil_kelas = mysqli_fetch_assoc($query_kelas)){
                ?>
                <option value="<?php echo $ambil_kelas['id_kelas']; ?>"><?php echo $ambil_kelas['nama_kelas']; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <input type="submit" name="simpan-siswa" value="Simpan Data Siswa" class="btn btn-primary">
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
		<a href="page/cetak-siswa.php" target="_Blank" class="btn btn-info btn-sm" data-toggle="tooltip"><i class="fa fa-print"></i> Cetak Data Siswa</a>
		</div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">     
      <div class="card mb-3">
        <div class="card-header">
          <h3><i class="fa fa-users"></i> Data Siswa</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
            <thead>
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No Hp</th>
                <th>Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead> 
            <?php
              $sql = "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas";
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
                <td><?php echo $ambil_data['nis'] ?></td>
                <td><?php echo $ambil_data['nama'] ?></td>
                <td><?php echo $ambil_data['tempat_lahir'] ?></td>
                <td><?php echo $ambil_data['tgl_lahir'] ?></td>
                <td><?php echo $ambil_data['alamat'] ?></td>
                <td><?php echo $ambil_data['jk'] ?></td>
                <td><?php echo $ambil_data['no_hp'] ?></td>
                <td><?php echo $ambil_data['nama_kelas'] ?></td>
                <td align="center">
                  <a href="javascript:;" data-id="<?php echo $ambil_data['nis'] ?>" data-toggle="modal" data-target="#hapus-siswa" class="btn btn-danger"><i class="fa fa-trash"></i></a>
				  <a href="index.php?p=edit-siswa&id=<?= $ambil_data['id_kelas']?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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
    <div id="hapus-siswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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