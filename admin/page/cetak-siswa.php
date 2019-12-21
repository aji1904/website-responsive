<?php 
// memanggil library FPDF
require('fpdf181/fpdf.php');
include '../../config.php';
session_start();

$query = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas ");

function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
} 

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm','Legal');
// membuat halaman baru
$pdf->AddPage();

$pdf->Image('cop.jpg',70,0,160);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(50,35,'',0,1);

$pdf->SetFont('Times','UB',14);
$pdf->Cell(0,15,'Data Kelas',0,1,'C');


$pdf->SetFont('Times','B',10);

$pdf->Cell(5,10,'',0,0);
$pdf->Cell(10,10,'No',1,0,'C');
$pdf->Cell(55,10,'NIS',1,0,'C');
$pdf->Cell(50,10,'Nama Siswa',1,0,'C');
$pdf->Cell(30,10,'Tempat Lahir',1,0,'C');
$pdf->Cell(20,10,'Tgl Lahir',1,0,'C');
$pdf->Cell(65,10,'Alamat',1,0,'C');
$pdf->Cell(10,10,'JK',1,0,'C');
$pdf->Cell(50,10,'Kelas',1,0,'C');
$pdf->Cell(35,10,'No HP',1,1,'C');


$pdf->SetFont('Times','',10);

$no = 1;
foreach($query as $row){
	$pdf->Cell(5,10,'',0,0);
    $pdf->Cell(10,10,$no,1,0,'C');
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(55,10,' '.$row['nis'],1,0,'L',true);
    $pdf->Cell(50,10,' '.$row['nama'],1,0,'L',true);
    $pdf->Cell(30,10,' '.$row['tempat_lahir'],1,0,'L',true);
    $pdf->Cell(20,10,' '.$row['tgl_lahir'],1,0,'L',true);
    $pdf->Cell(65,10,' '.$row['alamat'],1,0,'L',true);
    $pdf->Cell(10,10,' '.$row['jk'],1,0,'L',true);
    $pdf->Cell(50,10,' '.$row['nama_kelas'],1,0,'L',true);
    $pdf->Cell(35,10,' '.$row['no_hp'],1,1,'L',true);

	$no++;
}

$pdf->Cell(13,15,'',0,1);
$pdf->Cell(133,2,'',0,0);
$pdf->Cell(43,2,'Palembang, '.tanggal_indo ($tanggal),0,1,'L');

$pdf->Cell(50,5,'',0,1);

$pdf->Cell(133,2,'',0,0);
$pdf->Cell(43,2,'Guru Bimbingan Konseling',0,1,'L');
$pdf->Cell(13,25,'',0,1);

$pdf->SetFont('Times','U',10);
$pdf->Cell(133,2,'',0,0);
$pdf->Cell(43,2,$_SESSION['nama'],0,1,'L');
$pdf->Cell(13,4,'',0,1);

$pdf->SetFont('Times','',10);
$pdf->Cell(133,2,'',0,0);
$pdf->Cell(43,2,'NIP : '.$_SESSION['nip'],0,0,'L');

$pdf->SetFont('Arial','',10); 
$pdf->Output("Bukti-data.pdf", "I");

?>
