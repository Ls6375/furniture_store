<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Default Title'; ?></title>
    <link rel="stylesheet" href="/public/assets/styles.css">
    <?= $extraHead ?? ''; // This allows us to add custom head scripts or styles ?>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
		<!-- FontAwesome CDN -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
			integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

	<!-- Include the Navbar -->
	<?php include '../views/partials/navbar.php'; ?>

<main>
    <?= $content; // This is where the content for each page will be displayed ?>
</main>

<!-- Include the Footer -->
<?php include '../views/partials/footer.php'; ?>

<!-- Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

<!-- Optional Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
	integrity="sha384-oBqDVmMz4fnFO9gyb2h8aNCd9dL8f5P6Pewh2gQ9o96zFxLk2qjjfAK3kwvSvPp1"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
	integrity="sha384-pzjw8f+ua7Kw1TIq0p6OwV1RkK8xwJhFfXn8Qp6dHhZZqvFrPhxk3n7fJYJ7G0C5"
	crossorigin="anonymous"></script>

<?= $extraScripts ?? ''; // For any additional scripts we want to add for specific pages ?>
</body>
</html>
