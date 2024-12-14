<?php
$pageTitle = 'Shop Page';

$extraHead = <<<HTML
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXX');
</script>
HTML;

// Get filter query parameters from URL
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
// Determine the maximum price based on the products
$maxPrice = max(array_map(function($product) {
    return $product['price'];
}, $products));

$priceFilter = isset($_GET['price']) ? $_GET['price'] : $maxPrice;  // Default to 500 if no filter




// Filter products based on selected filters
$filteredProducts = array_filter($products, function ($product) use ($categoryFilter, $priceFilter) {
	// Ensure category comparison is type-safe
	if ($categoryFilter && (int)$product['category'] !== (int)$categoryFilter) {
			return false;
	}
	// Filter by price if selected
	if ($product['price'] > $priceFilter) {
			return false;
	}
	return true;

	
});


ob_start();
?>

<!-- Shop Section with Heading and Paragraph -->
<div class="container mt-5 text-left">
	<div class="row">
		<div class="col">
			<!-- Heading -->
			<h1 class="display-4 mb-2">Shop Our Collection</h1>

			<!-- Paragraph -->
			<p class="lead mb-3">
				Explore our wide range of products including the latest fashion, accessories, and exclusive deals. Find what
				you need and enjoy a seamless shopping experience.
			</p>
			<?php if ($errors['error'] ?? false) : ?>
				<div class="alert alert-danger">
					<?= $errors['error'] ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- Shop -->
<div class="container mt-5 mb-5">
	<div class="row">
		<!-- Filters Sidebar -->
		<div class="col-md-3">
			<div class="card p-3 position-sticky" style="top: 20px;">
				<h5>Filters</h5>

				<!-- Category Filter -->
				<h6>Category</h6>
				<form method="get" action="<?= route('shop') ?>">
					<select class="form-select mb-3" name="category">
						<option value="">Choose Category</option>
						<?php foreach ($categories as $category): ?>
							<option value="<?= htmlspecialchars($category['id']); ?>" <?= ($categoryFilter == $category['id']) ? 'selected' : ''; ?>>
								<?= htmlspecialchars($category['name']); ?>
							</option>
						<?php endforeach; ?>
					</select>

					<!-- Price Range Filter -->
					<h6>Price</h6>
					<input type="range" class="form-range" min="0" max="<?= $maxPrice ?>" step="1" id="priceRange" name="price" value="<?= $priceFilter; ?>" oninput="updatePriceLabel()">
					<label for="priceRange" id="priceLabel">Price: $0 - $<?= $priceFilter; ?></label>

					<button type="submit" class="btn btn-dark w-100 mt-3">Apply Filters</button>
					<a href="<?= route('shop') ?>" class="btn btn-dark w-100 mt-3">Reset Filters</a>
				</form>
			</div>
		</div>

		<!-- Product Listings -->
		<div class="col-md-9">
			<div class="row row-cols-1 row-cols-md-3 g-4">
				<?php foreach ($filteredProducts as $product): ?>
					<div class="col">
						<div class="card border-0 rounded-3 shadow-sm h-100">
							<img src="<?= assets('uploads/' . $product['mainImage']) ?>" class="card-img-top rounded-3" alt="<?= $product['name']; ?>" style="object-fit: cover; height: 180px;">
							<div class="card-body d-flex flex-column justify-content-between p-3">
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title text-dark mb-0"><?= $product['name'] ?></h5>
								</div>
								<p class="card-text text-dark fs-5 mb-3">$<?= number_format($product['price'], 2); ?></p>
								<a href="<?= route('product_detail/' .  $product['slug']) ?>" class="btn btn-dark w-100 py-2 rounded-3">View Detail</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<script>
  function updatePriceLabel() {
    var priceRange = document.getElementById("priceRange");
    var priceLabel = document.getElementById("priceLabel");
    priceLabel.textContent = "Price: $0 - $" + priceRange.value;
  }
</script>

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>
