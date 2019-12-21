<?php
  session_start();
  error_reporting(0);
  include '../config.php';
  if ($_SESSION['jabatan']!="Admin") {
    session_destroy();
    header("Location: ../");
  }
  ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BK - SMK Nurul Iman Palembang</title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="../bootstrap/img/nurul iman.png">
		<!-- Bootstrap CSS -->
		<link href="../bootstrap/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Font Awesome CSS -->
		<link href="../bootstrap/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Custom CSS -->
		<link href="../bootstrap/assets/css/style.css" rel="stylesheet" type="text/css" />
		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->
</head>
<body class="adminbody">
<div id="main">
	<!-- top bar navigation -->
	<div class="headerbar">
		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="index.html" class="logo"><img alt="Logo" src="../bootstrap/img/nurul iman.png" /> <span>KONSELING</span></a>
        </div>
        <nav class="navbar-custom">
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
    					<i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>                        
            </ul>
        </nav>
	</div>
	<!-- End Navigation -->
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
		<div class="sidebar-inner leftscroll">
			<div id="sidebar-menu">
    			<ul>
        			<li class="submenu">
        				<a class="active" href="index.php?p=home"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>
                    <li class="submenu text-center" style="padding: 10px;">
                        <img alt="Logo" src="../bootstrap/img/nurul iman.png" width="50%" />
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-download"></i> <span> Input Data </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><a href="index.php?p=input-jurusan"><i class="fa fa-fw fa-file-text"></i><span>  Data Jurusan </span> </a></li>
							<li> <a href="index.php?p=input-kelas"><i class="fa fa-fw fa-file-text"></i><span>  Data Kelas </span> </a></li>
							<li><a href="index.php?p=input-siswa"><i class="fa fa-fw fa-user"></i><span>  Data Siswa </span> </a></li>							
							<li><a href="index.php?p=input-konseling"><i class="fa fa-fw fa-book"></i><span>  Data Konseling </span> </a></li>					
						</ul>
                    </li>
                    <li class="submenu">
                        <a href="index.php?p=laporan-absen"><i class="fa fa-fw fa-files-o"></i><span> Laporan Data Konseling </span> </a>
                    </li>
                    <li class="submenu">
                        <a role="button" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-lock"></i><span> Ganti Password </span> </a>
                    </li>
                    <li class="submenu">
                        <a href="../logout.php"><i class="fa fa-fw fa-sign-out"></i><span> Logout </span> </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- End Sidebar -->
    <div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left">Dashboard</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div> <!-- Sub Nav Bar-->
                <?php
                $hasil = " ";
				if (is_null($_GET['password'])===false) {
					echo "<div class='alert alert-success'>Password Berhasil Diganti!</div>";
				} else {
					echo  "";
				}
                    include 'includes/controller-page.php';
                ?>
            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	<!-- MODAL GANTI PASSWORD -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <form action="includes/ganti-password.php" method="POST">
			  <div class="modal-body">
				<input type="text"  class="form-control" placeholder="Password Lama" name="password">
				<hr>
				<div class="row">
					<div class="col-lg-6">
						<input type="text"  class="form-control" placeholder="Password Baru" name="password-baru">
					</div>
					<div class="col-lg-6">
						<input type="text" class="form-control" placeholder="Re-Password Baru" name="password-baru2">
					</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" name="ganti-password">Save changes</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>
	<!-- END MODAL GANTI PASSWORD -->
	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">SMK Nurul Iman Palembang</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="#"><b>CS</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="../bootstrap/assets/js/modernizr.min.js"></script>
<script src="../bootstrap/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="js/hapus.js"></script>
<script src="../bootstrap/assets/js/moment.min.js"></script>
		
<script src="../bootstrap/assets/js/popper.min.js"></script>
<script src="../bootstrap/assets/js/bootstrap.min.js"></script>

<script src="../bootstrap/assets/js/detect.js"></script>
<script src="../bootstrap/assets/js/fastclick.js"></script>
<script src="../bootstrap/assets/js/jquery.blockUI.js"></script>
<script src="../bootstrap/assets/js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="../bootstrap/assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

	<!-- Counter-Up-->
	<script src="../bootstrap/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="../bootstrap/assets/plugins/counterup/jquery.counterup.min.js"></script>			

	<script>
		$(document).ready(function() {
			// data-tables
			$('#example1').DataTable();
					
			// counter-up
			$('.counter').counterUp({
				delay: 10,
				time: 600
			});
		} );		
	</script>
	
<!-- END Java Script for this page -->

</body>
</html>