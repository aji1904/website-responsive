<?php
	$dir = 'page/';
	if (isset($_GET['p'])) {
		$page = $_GET['p'];
		switch ($page) {
			case 'home':
				include $dir.'home.php';
				break;
			case 'input-konseling':
				include $dir.'input-konseling.php';
				break;
				case 'input-siswa':
					include $dir.'input-siswa.php';
					break;
					case 'input-jurusan':
						include $dir.'input-jurusan.php';
						break;
						case 'input-kelas':
							include $dir.'input-kelas.php';
							break;
							
			case 'edit-konseling':
				include $dir.'edit-konseling.php';
				break;
			case 'edit-jurusan':
				include $dir.'edit-jurusan.php';
				break;					
			case 'edit-kelas':
				include $dir.'edit-kelas.php';
				break;					
			case 'edit-siswa':
				include $dir.'edit-siswa.php';
				break;					
								case 'cetak-konseling':
									include $dir.'cetak-konseling.php';
									break;
			default:
				include $dir.'blank.php';
				break;
		} 
	} else {
			include $dir.'home.php';
		}
?>