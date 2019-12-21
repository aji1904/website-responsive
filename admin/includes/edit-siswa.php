<?php
	include '../../config.php';
    if (isset($_POST['edit-siswa'])) {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $tempat_lahir= $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $id_kelas = $_POST['id_kelas'];

        $edit_sql = "UPDATE tb_siswa SET nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir',
		alamat='$alamat', no_hp='$no_hp', id_kelas='$id_kelas' WHERE nis='$nis'";

		$query_sql = mysqli_query($db, $edit_sql);
        if ($query_sql) {
            $hasil = '<div class="alert alert-success" role="alert">
                      Berhasil Mengedit Data.
                    </div>';
                header("refresh:1;index.php?p=input-siswa");
        } else {
            $hasil = '<div class="alert alert-danger" role="alert">
                      Gagal Mengedit Data.
                    </div>';
                header("refresh:1;index.php?p=edit-siswa&id=".$nis);
        }
    }
?>