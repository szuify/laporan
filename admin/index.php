<?php
session_start();
if (!isset($_SESSION['id_staff'])) {
	header("Location: ../login.php");
	exit();
}
?>

<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor7 color-header headercolor2">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="../assets/images/logo.png" type="image/png" />
	<!--plugins-->
	<link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="../assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet" />
	<link href="../assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<script src="../assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="../assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="../assets/css/dark-theme.css" />
	<link rel="stylesheet" href="../assets/css/semi-dark.css" />
	<link rel="stylesheet" href="../assets/css/header-colors.css" />
	<title>SI-Pengelolaan Warga</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="../assets/images/logo.png" width="50px" height="50px" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rukunin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="index.php?page=dashboard">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="index.php?page=profile">
						<div class="parent-icon"><i class='bx bx-user-circle'></i>
						</div>
						<div class="menu-title">Profile</div>
					</a>
				</li>

				<li>
					<a href="index.php?page=informasi_acara">
						<div class="parent-icon"><i class='bx bx-calendar'></i>
						</div>
						<div class="menu-title">Informasi Acara</div>
					</a>
				</li>

				<li>
					<a href="index.php?page=laporan_warga">
						<div class="parent-icon"><i class='bx bx-task'></i>
						</div>
						<div class="menu-title">Laporan Warga</div>
					</a>
				</li>

				<li class="menu-label">Menu Acara</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-calendar-week'></i>
						</div>
						<div class="menu-title">Acara</div>
					</a>
					<ul>
						<li>
							<a href="index.php?page=add_acara"><i class="bx bx-calendar-star"></i>Buat Acara</a>
						</li>
						<li>
							<a href="index.php?page=halaman_acara"><i class="bx bx-history"></i>Riwayat Acara</a>
						</li>
						<li>
							<a href="index.php?page=add_jenisacara"><i class="bx bx-book-add"></i>Tambah Jenis Acara</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Menu Laporan</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-chalkboard'></i>
						</div>
						<div class="menu-title">Laporan</div>
					</a>
					<ul>
						<li>
							<a href="index.php?page=add_jenislaporan"><i class="bx bx-book-add"></i>Tambah Jenis Laporan</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Menu Anggota</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-user'></i>
						</div>
						<div class="menu-title">Anggota</div>
					</a>
					<ul>
						<li> <a href="index.php?page=add_anggota"><i class="bx bx-user-plus"></i>Tambah Anggota</a>
						</li>
						<li> <a href="index.php?page=list_anggota"><i class="bx bx-user-check"></i>List Anggota</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#"> <i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-toggle="dropdown" aria-expanded="false">
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-notifications-list">
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-message-list">						
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="../assets/images/team.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?= ucwords($_SESSION['nama']); ?></p>
								<p class="designattion mb-0">Administrator</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="index.php?page=profile"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<?php
				if (isset($_GET['page'])) {
					$page = $_GET['page'];

					switch ($page) {
						case 'dashboard':
							include "home.php";
							break;
						case 'profile':
							include "profile.php";
							break;
						case 'informasi_acara';
							include "informasi_acara.php";
							break;

// ACARA
						case 'add_acara':
							include "acara/add_acara.php";
							break;
						case 'upload_acara':
							include "acara/upload_acara.php";
							break;
						case 'edit_acara':
							include "acara/edit_acara.php";
							break;
						case 'delete_acara':
							include "acara/delete_acara.php";
							break;
						case 'halaman_acara':
							include "acara/halaman_acara.php";
							break;
						case 'add_jenisacara':
							include "acara/add_jenis_acara.php";
							break;
						case 'delete_jenis_acara':
							include "acara/delete_jenis_acara.php";
							break;

//HALAMAN LAPORAN
						case 'laporan_warga':
							include "laporan_warga.php";
							break;
						case 'confirm_laporan':
							include "laporan/confirm_laporan.php";
							break;
						case 'tolak_laporan':
							include "laporan/tolak_laporan.php";
							break;

//ANGGOTA
						case 'add_anggota':
							include "staff/add_anggota.php";
							break;
						case 'list_anggota':
							include "staff/list_anggota.php";
							break;
						case 'edit_anggota':
							include "staff/edit_anggota.php";
							break;
						case 'delete_anggota':
							include "staff/delete_anggota.php";
							break;
						
						
//MENU LAPORAM
						case 'edit_laporan':
							include "laporan/edit_laporan.php";
							break;
						case 'delete_laporan':
							include "laporan/delete_laporan.php";
							break;
						case 'riwayat_laporan':
							include "laporan/riwayat_laporan.php";
							break;
						case 'add_jenislaporan':
							include "laporan/add_jenis_laporan.php";
							break;
						case 'delete_jenis_laporan':
							include "laporan/delete_jenis_laporan.php";
							break;
						default:
							echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
							break;
					}
				} else {
					include "home.php";
				}

				?>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="../assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="../assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

			window.setTimeout(function() {
				$(".alert").fadeTo(1000, 0).slideUp(1000, function() {
					$(this).remove();
				});
			}, 2000);

			$(document).ready(function() {
				$('#example').DataTable();
			});

			$(document).ready(function() {
				var table = $('#example2').DataTable({
					lengthChange: false,
					buttons: ['copy', 'excel', 'pdf', 'print']
				});

				table.buttons().container()
					.appendTo('#example2_wrapper .col-md-6:eq(0)');
			});

			tinymce.init({
				selector: '#mytextarea'
			});

			$('#fancy-file-upload').FancyFileUpload({
				params: {
					action: 'fileuploader'
				},
				maxfilesize: 1000000
			});

			$(document).ready(function() {
				$('#image-uploadify').imageuploadify();
			})
			$(document).ready(function() {
				$('#image-uploadify2').imageuploadify();
			})
		});
	</script>
	<!--app JS-->
	<script src="../assets/js/app.js"></script>
</body>

</html>