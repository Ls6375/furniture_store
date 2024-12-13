<?php
$pageTitle = 'Product Detail Page';

$extraHead = <<<HTML
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXX');
</script>
HTML;

ob_start();
?>

<!-- Product Detail Section  -->
<div class="container mt-5">
	<div class="row">
		<!-- Product Image Slider -->
		<div class="col-md-6">
			<div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<?php foreach ($product['images'] as $index => $image) : ?>
						<div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
							<img src="<?= assets('uploads/' .  $image['image_name'])  ?>" class="d-block w-100" alt="Product Image <?= $index + 1 ?>" />
						</div>
					<?php endforeach; ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>

		<!-- Product Details -->
		<div class="col-md-6">
			<h2 class="mb-3"><?= $product['name']; ?></h2>
			<p class="text-muted mb-3">Category: <strong><?= $product['category']; ?></strong></p>
			<h3 class="mb-3">$<?= number_format($product['price'], 2); ?></h3>
			<p class="mb-4">
				This is a premium product offering exceptional value and quality, designed to meet your needs and exceed your expectations.
			</p>

			<!-- Add to Cart Form -->
			<form action="<?= route('cart/add') ?> " method="post">
				<input type="hidden" name="product_id" value="<?= $product['id']; ?>">

				<div class="d-flex align-items-center mb-3">
					<button type="submit" class="btn btn-dark w-75">Add to Cart</button>
					<div class="input-group w-25 ms-3 btn-outline-dark">
						<button class="btn btn-outline-dark" type="button" id="decreaseQty">-</button>
						<input type="number" class="form-control text-center" name="quantity" value="1" id="qtyInput" min="1" max="<?= $product['stock']; ?>" />
						<button class="btn btn-outline-dark" type="button" id="increaseQty">+</button>
					</div>
				</div>
			</form>

			<div class="mt-3">
				<button class="btn btn-outline-dark btn-sm me-2">
					<i class="fab fa-facebook-f"></i> Share
				</button>
				<button class="btn btn-outline-dark btn-sm me-2">
					<i class="fab fa-twitter"></i> Tweet
				</button>
				<button class="btn btn-outline-dark btn-sm me-2">
					<i class="fab fa-whatsapp"></i> WhatsApp
				</button>
			</div>
		</div>

	</div>

	<!-- Product Specifications Section -->
	<div class="row mt-5">
		<div class="col-12">
			<h4>Product Specifications</h4>
			<ul class="list-group">
				<li class="list-group-item">Stock: <?= $product['stock']; ?></li>
				<li class="list-group-item">SKU: <?= $product['id']; ?></li>
				<li class="list-group-item">Category ID: <?= $product['category']; ?></li>
			</ul>
		</div>
	</div>

	<!-- Customer Reviews Section -->
	<div class="row mt-5 mb-4">
		<div class="col-12">
			<h4>Customer Reviews</h4>
			<div class="d-flex mb-3">
				<p class="text-warning mb-0">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="far fa-star"></i>
				</p>
				<span class="ms-2">4.0/5 based on 150 reviews</span>
			</div>
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title">John Doe</h5>
					<p class="card-text">Great product! It fits perfectly in our living room and is really comfortable. Highly recommend it!</p>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title">Jane Smith</h5>
					<p class="card-text">The product is nice, but delivery took a bit longer than expected. Otherwise, very satisfied.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const qtyInput = document.getElementById('qtyInput');
    const decreaseQty = document.getElementById('decreaseQty');
    const increaseQty = document.getElementById('increaseQty');

    // Decrease quantity
    decreaseQty.addEventListener('click', () => {
        if (qtyInput.value > 1) {
            qtyInput.value = parseInt(qtyInput.value) - 1;
        }
    });

    // Increase quantity
    increaseQty.addEventListener('click', () => {
        if (parseInt(qtyInput.value) < parseInt(qtyInput.max)) {
            qtyInput.value = parseInt(qtyInput.value) + 1;
        }
    });
});
</script>

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>