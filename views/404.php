<?php
$pageTitle = 'Admin Home Page';
$hide_navbar = true;
$hide_footer = true;

$extraHead = '';

ob_start();
?>
<!-- Main Content -->
<div id="content">


	<!-- Page Wrapper -->
	<div id="wrapper" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- 404 Error Text -->
					<div class="text-center">
						<div class="error mx-auto" data-text="404">404</div>
						<p class="lead text-gray-800 mb-5">Page Not Found</p>
						<p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
						<a href="<?= route('index') ?>">&larr; Back to Homepage</a>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
$content = ob_get_clean();
require_once  __DIR__  . '/layouts/admin_layout.php';
?>