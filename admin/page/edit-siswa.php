<?php
include '../../config.php';
include 'includes/edit-siswa.php';

$id = $_GET['id'];
$select = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas WHERE tb_siswa.id_kelas='$id' ");
$data= mysqli_fetch_assoc($select);
?>

<div class="container mt-3">
  <div class="card">
    <div class="card-header">
      Edit Data Siswa
    </div>
    <div class="card-body">
      <form method="POST" action="">
        <?php
          echo $hasil;
        ?>

        <div class="form-row">
          <div class="col-md-3 mb-3">
            <label for="validationDefault02">NIS</label>
            <input class="form-control" id="validationDefault02" placeholder="NIS" name="nis" required="" type="text" value="<?= $data['nis']?>" readonly/>
		  </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault02">Nama</label>
            <input class="form-control" id="validationDefault02" placeholder="Nama" name="nama" required="" type="text" value="<?= $data['nama']?>"/>
		  </div>
          <div class="col-md-3 mb-3">
            <label for="nama_phl">Tempat Lahir</label>
            <input id="datepicker" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required="" type="text" value="<?= $data['tempat_lahir']?>"/>
		  </div>
		  <div class="col-md-3 mb-3">
            <label for="nama_phl">Tanggal Lahir</label>
            <input id="datepicker"	class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required=""  type="date" value="<?= $data['tgl_lahir']?>"/>
		  </div>
           <div class="col-md-3 mb-3">
            <label for="validationDefault02">Alamat</label>
            <input class="form-control" id="validationDefault02" placeholder="Alamat" name="alamat" required="" type="text" value="<?= $data['alamat']?>"/>
		   </div>
	
		   <div class="col-md-3 mb-3">
            <label for="validationDefault02">No Telp</label>
            <input class="form-control" id="validationDefault02" placeholder="Nomor Telp" name="no_hp" required="" type="text" value="<?= $data['no_hp']?>"/>
		  </div>
		  <div class="col-md-4 mb-3">
            <label for="Kelas">Kelas</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"><i>Kelas</i></label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="id_kelas" required="">
                <option>Pilih Kelas...</option>
                <?php
                  $sql_kelas = "SELECT * FROM tb_kelas";
                  $query_kelas = mysqli_query($db, $sql_kelas);
                  while($ambil_kelas = mysqli_fetch_assoc($query_kelas)){
                  
                ?>
                <option value="<?php echo $ambil_kelas['id_kelas']; ?>" 
                  <?php 
                    if($data['id_jurusan'] == $ambil_kelas['id_jurusan']){
                      echo "selected";
                    }
                  ?> 
                ><?php echo $ambil_kelas['nama_kelas']; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <input type="submit" name="edit-siswa" value="Edit Data Siswa" class="btn btn-primary">
		<td><a href="index.php?p=input-siswa" class="btn btn-sm btn-warning"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a></td>
      </form>
    </div>
    <div class="card-footer text-muted">
      <i>Pastikan data yang anda input telah benar sebelum menyimpan data.</i>
    </div>
  </div>
</div>