<!-- end row -->

<div class="alert alert-danger text-center" role="alert">
    <h1>SELAMAT DATANG</h1>
</div>
<?php
include '../../config.php';
	$data1 = mysqli_query($db, "SELECT COUNT(*) AS jumlah_jurusan FROM tb_jurusan ");
	$data2 = mysqli_query($db, "SELECT COUNT(*) AS jumlah_kelas FROM tb_kelas ");
	$data3 = mysqli_query($db, "SELECT COUNT(*) AS jumlah_siswa FROM tb_siswa ");
	$data4 = mysqli_query($db, "SELECT COUNT(*) AS jumlah_konseling FROM tb_konseling ");

	$data_jurusan = mysqli_fetch_assoc($data1);
	$data_kelas = mysqli_fetch_assoc($data2);
	$data_siswa = mysqli_fetch_assoc($data3);
	$data_konseling = mysqli_fetch_assoc($data4);
?>
<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				<div class="card-box noradius noborder bg-default">
						<i class="fa fa-file-text-o float-right text-white"></i>
						<h6 class="text-white text-uppercase m-b-20">Data <br>Jurusan</h6>
						<h1 class="m-b-20 text-white counter"><?= $data_jurusan['jumlah_jurusan'] ?></h1>
				</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				<div class="card-box noradius noborder bg-warning">
						<i class="fa fa-bar-chart float-right text-white"></i>
						<h6 class="text-white text-uppercase m-b-20">Data <br>Kelas</h6>
						<h1 class="m-b-20 text-white counter"><?= $data_kelas['jumlah_kelas'] ?></h1>
				</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				<div class="card-box noradius noborder bg-info">
						<i class="fa fa-user-o float-right text-white"></i>
						<h6 class="text-white text-uppercase m-b-20">Data <br>Siswa</h6>
						<h1 class="m-b-20 text-white counter"><?= $data_siswa['jumlah_siswa'] ?></h1>
				</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				<div class="card-box noradius noborder bg-danger">
						<i class="fa fa-bell-o float-right text-white"></i>
						<h6 class="text-white text-uppercase m-b-20">Data Konseling</h6>
						<h1 class="m-b-20 text-white counter"><?= $data_konseling['jumlah_konseling'] ?></h1>
				</div>
		</div>
</div>
<!-- end row -->