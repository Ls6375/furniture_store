<?php
$pageTitle = 'Furniture Product Management CMS';

$extraHead = <<<HTML
<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
	<style>
    body {
      font-family: sans-serif;
    }
    .filepond--item {
        width: calc(33.33% - .5em);
    }
  </style>
HTML;

ob_start();
?>

<!-- Main Content -->
<div id="content">

	<div class="my-5"></div>

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Furniture Product Management</h1>
		</div>

		<!-- Add Product Form -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
			</div>
			<div class="card-body">

				<!-- Display success message -->
				<?php if ($success ?? false) : ?>
					<div class="alert alert-success">
						<?= $success ?>
					</div>
				<?php endif; ?>

				<form id="productForm" action="<?= route('admin') ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="productName">Product Name</label>
						<input type="text" class="form-control <?= isset($errors['productName']) ? 'is-invalid' : '' ?>" id="productName" name="productName" value="<?= htmlspecialchars($_POST['productName'] ?? '') ?>" required>
						<?php if (isset($errors['productName'])): ?>
							<div class="invalid-feedback"><?= $errors['productName'] ?></div>
						<?php endif; ?>
					</div>

					<div class="form-group">
						<label for="slug">Product Slug</label>
						<input type="text" readonly class="form-control <?= isset($errors['slug']) ? 'is-invalid' : '' ?>" id="slug" name="slug" value="<?= htmlspecialchars($_POST['slug'] ?? '') ?>" required>
						<?php if (isset($errors['slug'])): ?>
							<div class="invalid-feedback"><?= $errors['slug'] ?></div>
						<?php endif; ?>
					</div>

					<div class="form-group">
						<label for="category">Category</label>
						<select name="category" class="form-control <?= isset($errors['category']) ? 'is-invalid' : '' ?>">
							<?php foreach ($categories as $category): ?>
								<option value="<?= htmlspecialchars($category['id']) ?>" <?= (htmlspecialchars($_POST['category'] ?? '') == $category['id']) ? 'selected' : '' ?>>
									<?= htmlspecialchars($category['name']) ?>
								</option>
							<?php endforeach; ?>
						</select>
						<?php if (isset($errors['category'])): ?>
							<div class="invalid-feedback"><?= $errors['category'] ?></div>
						<?php endif; ?>
					</div>

					<div class="form-group">
						<label for="price">Price</label>
						<input type="number" class="form-control <?= isset($errors['price']) ? 'is-invalid' : '' ?>" id="price" name="price" value="<?= htmlspecialchars($_POST['price'] ?? '') ?>" required>
						<?php if (isset($errors['price'])): ?>
							<div class="invalid-feedback"><?= $errors['price'] ?></div>
						<?php endif; ?>
					</div>

					<div class="form-group">
						<label for="stock">Stock</label>
						<input type="number" class="form-control <?= isset($errors['stock']) ? 'is-invalid' : '' ?>" id="stock" name="stock" value="<?= htmlspecialchars($_POST['stock'] ?? '') ?>" required>
						<?php if (isset($errors['stock'])): ?>
							<div class="invalid-feedback"><?= $errors['stock'] ?></div>
						<?php endif; ?>
					</div>

					<!-- Image Upload -->
					<div class="form-group">
						<label for="images">Upload Images</label>
						<input type="file" accept="image/*" class="filepond <?= isset($errors['images']) ? 'is-invalid' : '' ?>" id="images" name="images[]" multiple>
						<?php if (isset($errors['images'])): ?>
							<div class="invalid-feedback"><?= $errors['images'] ?></div>
						<?php endif; ?>
					</div>

					<!-- Main Image Selection -->
					<div class="form-group">
						<label for="mainImage">Select Main Image</label>
						<select class="form-control <?= isset($errors['mainImage']) ? 'is-invalid' : '' ?>" id="mainImage" name="mainImage">
							<!-- Options will be populated dynamically from the image upload section -->
							<?php if (!empty($_POST['mainImage'])): ?>
								<option value="<?= htmlspecialchars($_POST['mainImage']) ?>" selected><?= htmlspecialchars($_POST['mainImage']) ?></option>
							<?php endif; ?>
						</select>
						<?php if (isset($errors['mainImage'])): ?>
							<div class="invalid-feedback"><?= $errors['mainImage'] ?></div>
						<?php endif; ?>
					</div>

					<button type="submit" class="btn btn-primary">Save Product</button>
				</form>
			</div>

		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Products</h6>
			</div>
			<div class="card-body">
				<table id="productTable" class="table table-bordered">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Category</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Images</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<tbody>
						<?php if (empty($products)): ?>
							<tr>
								<td colspan="6" class="text-center">No data found</td>
							</tr>
						<?php else: ?>
							<?php foreach ($products as $product): ?>
								<tr>
									<td><?= htmlspecialchars($product['name']) ?></td>
									<td><?= htmlspecialchars($product['category']) ?></td>
									<td><?= htmlspecialchars($product['price']) ?></td>
									<td><?= htmlspecialchars($product['stock']) ?></td>
									<td>
										<img src="<?= htmlspecialchars(assets('uploads/' . $product['mainImage']) ?? 'default_image.jpg') ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="50">
									</td>
									<td>
										<a href="edit_product.php?id=<?= htmlspecialchars($product['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
										<form action="<?= route('admin/product-delete') ?>" method="POST" style="display:inline;">
											<input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
											<button type="submit" class="btn btn-danger btn-sm">Delete</button>
										</form>

									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>

					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>

<!-- DataTable Initialization Script -->
<?php

$extraScripts = <<<HTML
 <script>
	 
	 const fileInput = document.getElementById('images');
	 const selectElement = document.getElementById('mainImage');
 
	 fileInput.addEventListener('change', (event) => {
		 const files = event.target.files;
 
		 // Clear existing options
		 selectElement.innerHTML = '';
 
		 // Create a new option for each file
		 for (const file of files) {
			 const option = document.createElement('option');
			 option.value = file.name;
			 option.text = file.name;
			 selectElement.appendChild(option);
		 }
	 });
		// Auto-generate slug based on the product name
		$('#productName').on('input', function() {
	 var productName = $(this).val();
	 var slug = productName.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
	 $('#slug').val(slug);
	});


	 $(document).ready(function() {
  // Initialize DataTable
  $('#productTable').DataTable();



 });
  


 </script>
HTML;

?>

<script>

</script>

<?php
$content = ob_get_clean();
require_once  __DIR__  . '/../' . 'layouts/admin_layout.php';
?>