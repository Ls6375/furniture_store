<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<!-- FontAwesome CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
		integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Furniture Shop</title>
</head>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-sm navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Furniture Store</a>
			<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<ul class="navbar-nav me-auto mt-2 mt-lg-0">
					<!-- Home Link -->
					<li class="nav-item">
						<a class="nav-link active" href="#" aria-current="page">Home <span
								class="visually-hidden">(current)</span></a>
					</li>
					<!-- Shop Link -->
					<li class="nav-item">
						<a class="nav-link" href="#">Shop</a>
					</li>
					<!-- Categories Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">Categories</a>
						<div class="dropdown-menu" aria-labelledby="dropdownId">
							<a class="dropdown-item" href="#">Chairs</a>
							<a class="dropdown-item" href="#">Tables</a>
							<a class="dropdown-item" href="#">Sofas</a>
						</div>
					</li>
				</ul>

				<!-- Search Bar with Icon -->
				<form class="d-flex my-2 my-lg-0">
					<!-- Search Input and Button Group -->
					<div class="input-group">
						<input class="form-control me-sm-2" type="text" placeholder="Search" aria-label="Search">
						<!-- Search Icon Button -->
						<button class="btn btn-outline-secondary" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</form>

				<!-- User and Cart Icons -->
				<ul class="navbar-nav ms-auto">
					<!-- User Account Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-user"></i> Account
						</a>
						<div class="dropdown-menu" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="#">Sign In</a>
							<a class="dropdown-item" href="#">Sign Up</a>
						</div>
					</li>

					<!-- Cart Icon -->
					<li class="nav-item">
						<a class="nav-link" href="#">
							<i class="fas fa-shopping-cart"></i> Cart
							<span class="badge bg-danger">3</span> <!-- Example badge for 3 items -->
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

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
			</div>
		</div>
	</div>



	<!-- Shop -->
	<div class="container mt-5 mb-3">
		<div class="row">
			<!-- Filters Sidebar -->
			<div class="col-md-3">
				<div class="card p-3 position-sticky" style="top: 20px;">
					<h5>Filters</h5>

					<!-- Category Filter -->
					<h6>Category</h6>
					<select class="form-select mb-3">
						<option selected>Choose Category</option>
						<option value="1">Tops</option>
						<option value="2">Jeans</option>
						<option value="3">Shoes</option>
						<option value="4">Accessories</option>
					</select>

					<!-- Size Filter -->
					<h6>Size</h6>
					<select class="form-select mb-3">
						<option selected>Choose Size</option>
						<option value="S">Small</option>
						<option value="M">Medium</option>
						<option value="L">Large</option>
						<option value="XL">Extra Large</option>
					</select>

					<!-- Color Filter -->
					<h6>Color</h6>
					<select class="form-select mb-3">
						<option selected>Choose Color</option>
						<option value="1">Red</option>
						<option value="2">Blue</option>
						<option value="3">Black</option>
						<option value="4">White</option>
					</select>

					<!-- Price Range Filter -->
					<h6>Price</h6>
					<input type="range" class="form-range" min="0" max="500" step="1" id="priceRange">
					<label for="priceRange" id="priceLabel">Price: $0 - $500</label>
				</div>
			</div>

			<!-- Product Listings -->
			<div class="col-md-9">
				<div class="row row-cols-1 row-cols-md-3 g-4">
					<!-- Product 1 -->
					<div class="col">
						<div class="card border-0 rounded-3 shadow-sm h-100">
							<img src="https://via.placeholder.com/300" class="card-img-top rounded-3" alt="Product 1"
								style="object-fit: cover; height: 180px;">
							<div class="card-body d-flex flex-column justify-content-between p-3">
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title text-dark mb-0">Product 1</h5>
									<p class="card-text mb-0">
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="far fa-star text-muted"></i>
									</p>
								</div>
								<p class="card-text text-dark fs-5 mb-3">$25.00</p>
								<button class="btn btn-dark w-100 py-2 rounded-3">Add to Cart</button>
							</div>
						</div>
					</div>

					<!-- Product 2 -->
					<div class="col">
						<div class="card border-0 rounded-3 shadow-sm h-100">
							<img src="https://via.placeholder.com/300" class="card-img-top rounded-3" alt="Product 2"
								style="object-fit: cover; height: 180px;">
							<div class="card-body d-flex flex-column justify-content-between p-3">
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title text-dark mb-0">Product 2</h5>
									<p class="card-text mb-0">
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="far fa-star text-muted"></i>
									</p>
								</div>
								<p class="card-text text-dark fs-5 mb-3">$45.00</p>
								<button class="btn btn-dark w-100 py-2 rounded-3">Add to Cart</button>
							</div>
						</div>
					</div>

					<!-- Product 3 -->
					<div class="col">
						<div class="card border-0 rounded-3 shadow-sm h-100">
							<img src="https://via.placeholder.com/300" class="card-img-top rounded-3" alt="Product 3"
								style="object-fit: cover; height: 180px;">
							<div class="card-body d-flex flex-column justify-content-between p-3">
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title text-dark mb-0">Product 3</h5>
									<p class="card-text mb-0">
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="far fa-star text-muted"></i>
										<i class="far fa-star text-muted"></i>
									</p>
								</div>
								<p class="card-text text-dark fs-5 mb-3">$55.00</p>
								<button class="btn btn-dark w-100 py-2 rounded-3">Add to Cart</button>
							</div>
						</div>
					</div>

					<!-- Product 4 -->
					<div class="col">
						<div class="card border-0 rounded-3 shadow-sm h-100">
							<img src="https://via.placeholder.com/300" class="card-img-top rounded-3" alt="Product 4"
								style="object-fit: cover; height: 180px;">
							<div class="card-body d-flex flex-column justify-content-between p-3">
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title text-dark mb-0">Product 4</h5>
									<p class="card-text mb-0">
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
										<i class="fas fa-star text-warning"></i>
									</p>
								</div>
								<p class="card-text text-dark fs-5 mb-3">$35.00</p>
								<button class="btn btn-dark w-100 py-2 rounded-3">Add to Cart</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Centered Pagination -->
				<div class="d-flex justify-content-center mt-4">
					<nav aria-label="Product pagination">
						<ul class="pagination">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Previous</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active">
								<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
							</li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav>
				</div>

			</div>
		</div>
	</div>





	<!-- Footer Section -->
	<footer class="bg-dark text-white pt-5 pb-4">
		<div class="container">
			<div class="row">
				<!-- About Us Section -->
				<div class="col-md-3">
					<h5>About Us</h5>
					<p>We offer a wide range of high-quality furniture for every home and office. Our products are designed
						for
						comfort and style.</p>
				</div>

				<!-- Quick Links Section -->
				<div class="col-md-3">
					<h5>Quick Links</h5>
					<ul class="list-unstyled">
						<li><a href="#" class="text-white text-decoration-none">Home</a></li>
						<li><a href="#" class="text-white text-decoration-none">Shop</a></li>
						<li><a href="#" class="text-white text-decoration-none">Contact</a></li>
						<li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
					</ul>
				</div>

				<!-- Contact Section -->
				<div class="col-md-3">
					<h5>Contact</h5>
					<p>123 Furniture St., New York, NY</p>
					<p>Email: support@furniturestore.com</p>
					<p>Phone: (123) 456-7890</p>
				</div>

				<!-- Social Media Section -->
				<div class="col-md-3">
					<h5>Follow Us</h5>
					<ul class="list-unstyled">
						<li><a href="#" class="text-white text-decoration-none"><i class="fab fa-facebook-f"></i> Facebook</a>
						</li>
						<li><a href="#" class="text-white text-decoration-none"><i class="fab fa-twitter"></i> Twitter</a></li>
						<li><a href="#" class="text-white text-decoration-none"><i class="fab fa-instagram"></i> Instagram</a>
						</li>
						<li><a href="#" class="text-white text-decoration-none"><i class="fab fa-youtube"></i> YouTube</a></li>
					</ul>
				</div>
			</div>

			<!-- Footer Bottom -->
			<div class="row mt-4">
				<div class="col-12 text-center">
					<p class="mb-0">© 2024 Furniture Store. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- Font Awesome for Icons -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>

	<!-- Holder.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"
		integrity="sha512-O6R6IBONpEcZVYJAmSC+20vdsM07uFuGjFf0n/Zthm8sOFW+lAq/OK1WOL8vk93GBDxtMIy6ocbj6lduyeLuqQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		Holder.addTheme("dark", {
			bg: "#000",
			fg: "#aaa",
			size: 11,
			font: "Monaco",
			fontweight: "normal"
		});
	</script>
</body>

</html>