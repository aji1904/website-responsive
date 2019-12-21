<?php
include '../../config.php';
include 'includes/edit-konseling.php';

$id = $_GET['id'];
$select = mysqli_query($db, "SELECT * FROM tb_konseling JOIN tb_siswa ON tb_siswa.nis = tb_konseling.nis
JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas WHERE tb_konseling.id_konseling='$id' ");
$data= mysqli_fetch_assoc($select);
?>
<div class="container mt-3">
  <div class="card">
    <div class="card-header">
      Edit Data Konseling
    </div>
    <div class="card-body">
      <?php
        echo $hasil;
      ?>
      <form method="POST" action="">
        <div class="form-row">
		  <div class="col-md-6 mb-3">
            <label for="siswa">NIS Siswa</label>
            <div class="input-group">
                <input class="form-control" type="text" value="<?= $data['nama']?>" readonly>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationDefault02">Keterangan</label>
            <input class="form-control" id="validationDefault02" name="keterangan" required="" type="text" value="<?= $data['keterangan']?>">
            <input type="hidden" value="<?= $id?>" name="id">
          </div>
		   <div class="col-md-6 mb-3">
            <label for="id">Bidang Bimbingan</label>
            <div class="input-group">
              <select class="custom-select" id="inputGroupSelect01" name="bid_bimbingan" required="">
                <?php if ($data['bid_bimbingan'] == "Pribadi") : ?>
                        <option value="Pribadi" selected>Pribadi</option>
                        <option value="Sosial">Sosial</option>
                        <option value="Pribadi&Sosial">Pribadi&Sosial</option>
                        <?php elseif ($data['bid_bimbingan'] == "Sosial") : ?>
                        <option value="Pribadi" >Pribadi</option>
                        <option value="Sosial" selected>Sosial</option>
                        <option value="Pribadi&Sosial">Pribadi&Sosial</option>
						<?php else : ?>
                        <option value="Pribadi" >Pribadi</option>
                        <option value="Sosial">Sosial</option>
                        <option value="Pribadi&Sosial" selected>Pribadi&Sosial</option>
                        <?php  endif ?>
              </select>
            </div>
          </div>
		 
		  <div class="col-md-6 mb-3">
            <label for="validationDefault02">Tindak Lanjut</label>
            <div class="input-group">
              <select class="custom-select" id="inputGroupSelect01" name="tindak_lanjut" required="">
                <?php if ($data['tindak_lanjut'] == "Pembinaan") : ?>
                        <option value="Pembinaan" selected>Pembinaan</option>
                        <option value="Surat Panggilan">Surat Panggilan</option>
						<?php else : ?>
                        <option value="Pembinaan" >Pembinaan</option>
                        <option value="Surat Panggilan" selected>Surat Panggilan</option>
                        <?php  endif ?>
              </select>
            </div>
            <input type="hidden" value="<?= $id?>" name="id">
          </div>
        </div>
        <button class="btn btn-primary" type="submit" name="edit-konseling">Edit Data Konseling</button>
		<td><a href="index.php?p=input-konseling" class="btn btn-sm btn-warning"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a></td>
      </form>
    </div>
    <div class="card-footer text-muted">
      <i>Pastikan data yang anda input telah benar sebelum menyimpan data.</i>
    </div>
  </div>
</div>
<br>
