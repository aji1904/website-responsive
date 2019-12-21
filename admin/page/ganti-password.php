<?php
	session_start();

	include '../../config.php';
	if (isset($_POST['ganti-password'])) {
		$user = $_SESSION['user'];
		$sql = "SELECT password FROM tb_users WHERE username='$user'";
		$query = mysqli_query($db, $sql);
		$ambil_pw = mysqli_fetch_array($query);

		$password_lama = $_POST['password'];
		$password_lama2 = $ambil_pw['password'];
		if ($password_lama == $password_lama2 ) {
			$password_baru = $_POST['password-baru'];
			$password_baru2 = $_POST['password-baru2'];
			if ($password_baru == $password_baru2) {
				$ganti_pw = "UPDATE tb_users SET password = '$password_baru2' 
							WHERE username = '$user'";
				$query = mysqli_query($db, $ganti_pw);
				if ($query) {
					header("Location: ../index.php?password=1");
				} else {
					echo mysqli_error($db);
				}

			} else {
				echo mysqli_error($db);
			}
		} else {
			echo(mysqli_error($db));
		}
	} else {
		echo(mysqli_error($db));
	}
?>