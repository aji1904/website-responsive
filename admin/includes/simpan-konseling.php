<?php
	if (isset($_POST['simpan-konseling'])) {
		$id_konseling = $_POST['id_konseling'];
		$nis = $_POST['nis'];
		$keterangan = $_POST['keterangan'];

		$sql = "INSERT INTO tb_konseling VALUES('$id_konseling','$nis','$keterangan')";
		$query = mysqli_query($db, $sql);
		if ($query) {
			$hasil = '<div class="alert alert-success" role="alert">
                      Berhasil Menyimpan Data.
                    </div>';
				header("refresh:1;index.php?p=input-konseling");
		} else {
			$hasil = '<div class="alert alert-danger" role="alert">
                      Gagal Menyimpan Data.
                    </div>';
                header("refresh:1;index.php?p=input-konseling");
		}
}
?>