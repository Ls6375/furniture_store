<?php
$pageTitle = 'Home Page';

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

<!-- Carousel -->
<div id="carouselId" class="carousel slide" data-bs-ride="carousel">
	<ol class="carousel-indicators">
		<li
			data-bs-target="#carouselId"
			data-bs-slide-to="0"
			class="active"
			aria-current="true"
			aria-label="First slide"></li>
		<li
			data-bs-target="#carouselId"
			data-bs-slide-to="1"
			aria-label="Second slide"></li>
		<li
			data-bs-target="#carouselId"
			data-bs-slide-to="2"
			aria-label="Third slide"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<img
				src="images/s1.webp"
				class="w-100 d-block"
				alt="Modern Sofa Set" />
			<div class="carousel-caption d-none d-md-block">
				<h5>Discover Modern Comfort</h5>
				<p>
					Explore our exclusive collection of contemporary sofa sets
					designed for elegance and comfort.
				</p>
			</div>
		</div>
		<div class="carousel-item">
			<img
				src="images/s2.webp"
				class="w-100 d-block"
				alt="Elegant Dining Table" />
			<div class="carousel-caption d-none d-md-block">
				<h5>Relax in Comfort</h5>
				<p>
					Transform your bedroom into a haven of relaxation with our cozy
					and stylish furniture.
				</p>
			</div>
		</div>
		<div class="carousel-item">
			<img
				src="images/s3.webp"
				class="w-100 d-block"
				alt="Cozy Bedroom Setup" />
			<div class="carousel-caption d-none d-md-block">
				<h5>Dining in Style</h5>
				<p>
					Upgrade your dining experience with our range of luxurious dining
					tables and chairs.
				</p>
			</div>
		</div>
	</div>

	<button
		class="carousel-control-prev"
		type="button"
		data-bs-target="#carouselId"
		data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button
		class="carousel-control-next"
		type="button"
		data-bs-target="#carouselId"
		data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>

<!-- Category -->
<section class="py-5 bg-light">
	<div class="container">
		<h2 class="text-center mb-4">Shop by Category</h2>
		<!-- Text below the heading -->
		<p class="text-center text-muted mb-4">
			Explore our wide range of high-quality furniture items tailored for
			every home and office.
		</p>
		<div class="row g-4">
			<?php
			foreach (array_slice($categories, 0, 3) as $category) {
				echo '<div class="col-md-4">';
				echo ' <div class="card text-center border-0 shadow-sm">';
				echo ' <img src="' . assets('uploads/' .  $category['image'] )  . '" class="img-fluid" alt="' . $category['name'] . '" />';
				echo ' <div class="card-body">';
				echo ' <h5 class="card-title">' . $category['name'] . '</h5>';
				echo ' <a href="'. route('shop') . '" class="btn btn-light">Shop Now</a>';
				echo ' </div>';
				echo ' </div>';
				echo '</div>';
			}
			?>
		
		</div>
	</div>
</section>

<!-- Latest Arrivals -->
<section class="py-5 bg-light">
	<div class="container">
		<!-- Main Header -->
		<h2 class="text-center mb-4">Latest Arrivals</h2>

		<!-- Text below the heading -->
		<p class="text-center text-muted mb-4">
			Discover the newest and most stylish pieces for your home and office.
		</p>

		<!-- Row for images -->
		<div class="row g-4 align-items-baseline">
			<!-- Left Image -->
			<div class="col-md-4">
				<div class="card text-center border-0 shadow-sm">
					<img
						src="images/image.png"
						class="img-fluid"
						alt="Left Image"
						style="height: 100%; object-fit: cover" />
				</div>
			</div>

			<!-- Center (Larger) Image -->
			<div class="col-md-4">
				<div class="card text-center border-0 shadow-sm mb-4">
					<img
						src="images/newarrival.jpg"
						class="img-fluid"
						alt="Main Image"
						style="height: 100%; object-fit: cover" />
				</div>
			</div>

			<!-- Right Image -->
			<div class="col-md-4">
				<div class="card text-center border-0 shadow-sm">
					<img
						src="images/twist-stripes-rug-707475.jpg"
						class="img-fluid"
						alt="Right Image"
						style="height: 100%; object-fit: cover" />
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>