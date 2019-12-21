<?php
	include '../../config.php';
	if (isset($_POST['simpan'])) {
		$id_kelas = $_POST['id_kelas'];
		$id_jurusan = $_POST['nama_jurusan'];
		$nama_kelas = $_POST['nama_kelas'];
		$wali_kelas = $_POST['wali_kelas'];
		$nip_wali = $_POST['nip_wali'];
		$sql = "INSERT INTO tb_kelas VALUES('$id_kelas','$id_jurusan','$nama_kelas','$wali_kelas','$nip_wali')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			header("Location: ../index.php?p=input-kelas&status=1");
		} else {
			echo mysqli_error($db);
		}
	}
?>