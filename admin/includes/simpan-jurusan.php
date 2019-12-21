<?php
	include '../../config.php';
	if (isset($_POST['simpan-jurusan'])) {
		$id_jurusan = $_POST['id_jurusan'];
		$nama_jurusan = $_POST['nama_jurusan'];
		$ketua_jurusan = $_POST['ketua_jurusan'];
		$sql = "INSERT INTO tb_jurusan VALUES('$id_jurusan','$nama_jurusan','$ketua_jurusan')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			header("Location: ../index.php?p=input-jurusan&status=1");
		} else {
			echo mysqli_error($db);
		}
	}
?>