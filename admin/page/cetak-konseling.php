<?php 
// memanggil library FPDF
require('fpdf181/fpdf.php');
include '../../config.php';
session_start();

if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($db, "SELECT * FROM tb_konseling JOIN tb_siswa ON tb_siswa.nis = tb_konseling.nis JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas JOIN tb_jurusan ON tb_kelas.id_jurusan = tb_jurusan.id_jurusan WHERE tb_konseling.id_konseling='$id' ");
		$row=mysqli_fetch_assoc($query);
}

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
$tgl_datang = date('l', strtotime('+3 days', strtotime($tanggal)));
$tahun = date('Y');

if ($tgl_datang == 'Sunday') {
	$hadir = date('Y-m-d', strtotime('+4 days', strtotime($tanggal)));
} else {
	$hadir = date('Y-m-d', strtotime('+3 days', strtotime($tanggal)));
}

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();

$pdf->Image('cop.jpg',22,0,166);

// Memberikan space kebawah agar tidak terlalu rapat

$pdf->Cell(50,33,'',0,1);

$pdf->SetFont('Times','',10);
$pdf->Cell(50,4,'',0,1);

$pdf->Cell(59,2,'',0,0);
$pdf->Cell(120,2,'Palembang, '.tanggal_indo ($tanggal),0,1,'R');

$pdf->Cell(50,4,'',0,1);

$pdf->SetFont('Times','',10);
$pdf->Cell(13,10,'',0,0);
$pdf->Cell(25,10,'Lampiran',0,0,'L');
$pdf->Cell(12,10,':',0,0,'L');
$pdf->Cell(0,10,'/SMKNurulImanPlg/BK/'.$tahun,0,1);

$pdf->Cell(13,6,'',0,0);
$pdf->Cell(25,6,'Perihal',0,0,'L');
$pdf->Cell(5,6,':',0,0);
$pdf->Cell(0,6,'Pemanggilan Orang Tua',0,1);

$pdf->Cell(0,8,'',0,1);

$pdf->Cell(25,8,'',0,0);
$pdf->Cell(20,8,'Kepada Yth',0,1);

$pdf->Cell(25,8,'',0,0);
$pdf->Cell(20,8,'Orang tua/Wali dari '.$row['nama'],0,1);

$pdf->Cell(25,8,'',0,0);
$pdf->Cell(20,8,'Di-',0,1);

$pdf->Cell(30,8,'',0,0);
$pdf->Cell(20,8,'Tempat',0,1);

$pdf->Cell(13,10,'',0,0);
$pdf->Cell(100,10,"Assalamu'alaikum Warohmatullahhi Wabarokaatuh.",0,1);
$pdf->Cell(13,3,'',0,1);


$pdf->Cell(13,6,'',0,0);
$pdf->MultiCell(170,6,"Yang bertanda tangan dibawah ini, Wali Kelas dan Guru BK(Bimbingan Konseling) SMK Nurul Iman Palembang, dengan ini menyampaikan kepada Bapak/Ibu/Wali siswa atas nama : ",0,1);
$pdf->Cell(13,5,'',0,1);

$pdf->SetFont('Times','B',10);
$pdf->Cell(30,8,'',0,0);
$pdf->Cell(17,8,'Nama',0,0);
$pdf->Cell(3,8,':',0,0);
$pdf->Cell(20,8,$row['nama'],0,1);

$pdf->Cell(30,8,'',0,0);
$pdf->Cell(17,8,'Kelas',0,0);
$pdf->Cell(3,8,':',0,0);
$pdf->Cell(20,8,$row['nama_kelas'],0,1);

$pdf->Cell(30,8,'',0,0);
$pdf->Cell(17,8,'Jurusan',0,0);
$pdf->Cell(3,8,':',0,0);
$pdf->Cell(20,8,$row['nama_jurusan'],0,1);

$pdf->Cell(13,5,'',0,1);

$pdf->SetFont('Times','',10);
$pdf->Cell(13,6,'',0,0);
$pdf->MultiCell(170,6,'Siswa tersebut telah melakukan pelanggaran tata tertib yaitu '.$row['keterangan'].'. Berkaitan dengan hal tersebut diatas, maka dengan ini kami sampaikan surat Pemanggilan Orang Tua dengan harapan Bapak/Ibu (Wali dari siswa dimaksud) dapat hadir di SMK Nurul Iman Palembang pada hari '.tanggal_indo ($hadir, true).' pukul 09.00 WIB.',0,1);

$pdf->Cell(13,3,'',0,1);
$pdf->Cell(13,10,'',0,0);
$pdf->Cell(100,10,'Demikian kami sampaikan, atas kehadiran Bapak/Wali Siswa, saya ucapkan terima kasih.',0,1);

$pdf->Cell(13,10,'',0,0);
$pdf->Cell(100,10,"Wassalamu'alaikum Warohmatullahhi Wabarokaatuh.",0,1);
$pdf->Cell(13,7,'',0,1);

$pdf->SetFont('Times','',10);

$pdf->Cell(59,2,'',0,0);
$pdf->Cell(110,2,'Hormat Kami',0,1,'R');
$pdf->Cell(13,8,'',0,1);

$pdf->Cell(13,2,'',0,0);
$pdf->Cell(43,2,'Wali Kelas',0,0,'L');
$pdf->Cell(80,2,'',0,0);
$pdf->Cell(43,2,'Guru Bimbingan Konseling',0,1,'L');
$pdf->Cell(13,25,'',0,1);

$pdf->SetFont('Times','U',10);
$pdf->Cell(13,2,'',0,0);
$pdf->Cell(43,2,$row['wali_kelas'],0,0,'L');
$pdf->Cell(80,2,'',0,0);
$pdf->Cell(43,2,$_SESSION['nama'],0,1,'L');
$pdf->Cell(13,4,'',0,1);

$pdf->SetFont('Times','',10);
$pdf->Cell(13,2,'',0,0);
$pdf->Cell(43,2,'NIP : '.$row['nip_wali'],0,0,'L');
$pdf->Cell(80,2,'',0,0);
$pdf->Cell(43,2,'NIP : '.$_SESSION['nip'],0,0,'L');

$pdf->SetFont('Arial','',10); 
$pdf->Output("Bukti-data.pdf", "I");

?>
