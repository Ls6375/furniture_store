<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $pageTitle ?? 'Admin Panel'; ?></title>
	<link rel="stylesheet" href="<?= assets()  ?>admin/css/sb-admin-2.css">
	<?= $extraHead ?? '';
	?>
	<!-- Custom fonts for this template-->
	<link href="<?= assets()  ?>admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= assets()  ?>admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

	<!-- Page Wrapper -->
	<div id="wrapper">
		<?php
		if (!isset($hide_navbar)) {
			# code...
		?>
			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= route('admin') ?>">
					<div class="sidebar-brand-icon rotate-n-15">
						<i class="fas fa-laugh-wink"></i>
					</div>
					<div class="sidebar-brand-text mx-3">Admin Panel</div>
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="<?= route('admin') ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Products</span></a>

					<a class="nav-link" href="<?= route('admin/categories') ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Categories</span></a>

				</li>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>

				<!-- Sidebar Message -->
				<div class="sidebar-card d-none d-lg-flex">
					<img class="sidebar-card-illustration mb-2" src="<?= assets()  ?>admin/img/undraw_rocket.svg" alt="...">
					<a class="btn btn-success btn-sm" href="<?= route('admin/logout') ?>">Logout</a>
				</div>

			</ul>
			<!-- End of Sidebar -->
		<?php
		}
		?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<main>
				<?= $content; // This is where the content for each admin page will be displayed 
				?>
			</main>
			<?php
			if (!isset($hide_footer)) {
				# code...
			?>
			<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Furniture Store <?= date('Y') ?></span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
			<?php
			}
			?>

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>




	<!-- Bootstrap core JavaScript-->
	<script src="<?= assets()  ?>admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?= assets()  ?>admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= assets()  ?>admin/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= assets()  ?>admin/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?= assets()  ?>admin/vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?= assets()  ?>admin/js/demo/chart-area-demo.js"></script>
	<script src="<?= assets()  ?>admin/js/demo/chart-pie-demo.js"></script>

	<?= $extraScripts ?? ''; // Add admin-specific scripts if needed 
	?>
</body>

</html>