<?php
	include '../../config.php';
	if (isset($_POST['simpan-siswa'])) {
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$no_hp = $_POST['no_hp'];
		$id_kelas = $_POST['nama_kelas'];
		
		$sql = "INSERT INTO tb_siswa VALUES('$nis','$nama','$tempat_lahir','$tgl_lahir','$alamat','$jk','$no_hp','$id_kelas')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			header("Location: ../index.php?p=input-siswa&status=1");
		} else {
			echo mysqli_error($db);
		}
	}
?>