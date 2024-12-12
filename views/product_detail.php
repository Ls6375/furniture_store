<?php
$pageTitle = 'Sign In Page';

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
			<div
				id="productCarousel"
				class="carousel slide"
				data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img
							src="./images/chair1.jpg"
							class="d-block w-100"
							alt="Product Image 1" />
					</div>
					<div class="carousel-item">
						<img
							src="./images/chair2.jpg"
							class="d-block w-100"
							alt="Product Image 2" />
					</div>
					<div class="carousel-item">
						<img
							src="./images/chair3.jpeg"
							class="d-block w-100"
							alt="Product Image 3" />
					</div>
				</div>
				<button
					class="carousel-control-prev"
					type="button"
					data-bs-target="#productCarousel"
					data-bs-slide="prev">
					<span
						class="carousel-control-prev-icon"
						aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button
					class="carousel-control-next"
					type="button"
					data-bs-target="#productCarousel"
					data-bs-slide="next">
					<span
						class="carousel-control-next-icon"
						aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>

		<!-- Product Details -->
		<div class="col-md-6">
			<h2 class="mb-3">Comfortable Sofa Set</h2>
			<p class="text-muted mb-3">Category: <strong>Furniture</strong></p>

			<!-- Product Rating -->
			<div class="mb-3">
				<p class="text-warning">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="far fa-star"></i>
					<span class="text-muted"> (4.0 based on 150 reviews)</span>
				</p>
			</div>

			<!-- Product Price -->
			<h3 class="mb-3">$899.99</h3>

			<!-- Product Size Options in Boxes -->
			<!-- <div class="mb-3">
				<label for="sizeSelect" class="form-label">Size</label>
				<div class="d-flex gap-2">
					<button type="button" class="btn btn-outline-dark" id="sizeS">
						S
					</button>
					<button type="button" class="btn btn-outline-dark" id="sizeM">
						M
					</button>
					<button type="button" class="btn btn-outline-dark" id="sizeL">
						L
					</button>
				</div>
			</div> -->

			<!-- Product Description -->
			<p class="mb-4">
				This premium sofa set offers exceptional comfort and style, designed
				to fit seamlessly into any living room space. It features durable
				upholstery and ergonomic cushions for maximum relaxation.
			</p>

			<!-- Add to Cart & Quantity Control -->
			<div class="d-flex align-items-center mb-3">
				<!-- Add to Cart Button (larger) -->
				<button class="btn btn-dark w-75">Add to Cart</button>

				<!-- Quantity Control -->
				<div class="input-group w-25 ms-3 btn-outline-dark">
					<button
						class="btn btn-outline-dark"
						type="button"
						id="decreaseQty">
						-
					</button>
					<input
						type="number"
						class="form-control text-center"
						value="1"
						id="qtyInput"
						min="1"
						max="100" />
					<button
						class="btn btn-outline-dark"
						type="button"
						id="increaseQty">
						+
					</button>
				</div>
			</div>

			<!-- Social Share Buttons -->
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
				<li class="list-group-item">Brand: ComfortCraft</li>
				<li class="list-group-item">Material: Soft Leather</li>
				<li class="list-group-item">Weight: 35 kg</li>
				<li class="list-group-item">Dimensions: 200 x 90 x 75 cm</li>
				<li class="list-group-item">Warranty: 3 Years</li>
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
					<p class="card-text">
						Great sofa! It fits perfectly in our living room and is really
						comfortable. Highly recommend it!
					</p>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title">Jane Smith</h5>
					<p class="card-text">
						The sofa is nice, but delivery took a bit longer than expected.
						Otherwise, very satisfied.
					</p>
				</div>
			</div>
			<!-- Add Review Button -->
			<!-- <button class="btn btn-outline-primary btn-sm">Write a Review</button> -->
		</div>
	</div>
</div>


<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>