<?php 
// memanggil library FPDF
require('fpdf181/fpdf.php');
include '../../config.php';
session_start();

$query = mysqli_query($db, "SELECT * FROM tb_kelas JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_kelas.id_jurusan ");

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
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();

$pdf->Image('cop.jpg',22,0,166);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(50,35,'',0,1);

$pdf->SetFont('Times','UB',14);
$pdf->Cell(200,15,'Data Kelas',0,1,'C');


$pdf->SetFont('Times','B',10);

$pdf->Cell(14,10,'',0,0);
$pdf->Cell(10,10,'No',1,0,'C');
$pdf->Cell(55,10,'Nama Jurusan',1,0,'C');
$pdf->Cell(50,10,'Nama Kelas',1,0,'C');
$pdf->Cell(50,10,'Wali Kelas',1,1,'C');


$pdf->SetFont('Times','',10);

$no = 1;
foreach($query as $row){
	$pdf->Cell(14,10,'',0,0);
    $pdf->Cell(10,10,$no,1,0,'C');
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(55,10,' '.$row['nama_jurusan'],1,0,'L',true);
    $pdf->Cell(50,10,' '.$row['nama_kelas'],1,0,'L',true);
    $pdf->Cell(50,10,' '.$row['wali_kelas'],1,1,'L',true);

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
