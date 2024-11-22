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
	<title>Furniture Store</title>
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
					<li class="nav-item">
						<a class="nav-link active" href="#">Home <span class="visually-hidden">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Shop</a>
					</li>
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
				<form class="d-flex my-2 my-lg-0">
					<div class="input-group">
						<input class="form-control me-sm-2" type="text" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-secondary" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</form>
				<ul class="navbar-nav ms-auto">
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
					<li class="nav-item">
						<a class="nav-link" href="#">
							<i class="fas fa-shopping-cart"></i> Cart
							<span class="badge bg-danger">3</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Login Page Section -->
	<div class="d-flex justify-content-center align-items-center mb-5">
		<div class="container mt-5 p-4 border rounded shadow-sm" style="max-width: 500px; width: 100%;">
			<!-- Pills navs -->
			<ul class="nav nav-pills nav-justified mb-3 " id="ex1" role="tablist">
				<li class="nav-item" role="presentation">
					<a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
						aria-controls="pills-login" aria-selected="true">Login</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
						aria-controls="pills-register" aria-selected="false">Register</a>
				</li>
			</ul>
			<!-- Pills content -->
			<div class="tab-content" id="ex1-content">
				<!-- Login form -->
				<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
					<form>
						<!-- Email input -->
						<div class="form-outline mb-4">
							<input type="email" id="loginEmail" class="form-control" required />
							<label class="form-label" for="loginEmail">Email or username</label>
						</div>

						<!-- Password input -->
						<div class="form-outline mb-4">
							<input type="password" id="loginPassword" class="form-control" required />
							<label class="form-label" for="loginPassword">Password</label>
						</div>

						<!-- 2 column grid layout -->
						<div class="row mb-4">
							<div class="col-md-6 d-flex justify-content-center">
								<!-- Checkbox -->
								<div class="form-check mb-3 mb-md-0">
									<input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
									<label class="form-check-label" for="loginCheck"> Remember me </label>
								</div>
							</div>

							<div class="col-md-6 d-flex justify-content-center">
								<!-- Simple link -->
								<a href="#!">Forgot password?</a>
							</div>
						</div>

						<!-- Submit button -->
						<button type="submit" class="btn btn-dark mb-3 w-100">Sign in</button>

						<!-- Register buttons -->
						<div class="text-center">
							<p>Not a member? <a href="#!">Register</a></p>
						</div>
					</form>
				</div>

				<!-- Register form -->
				<div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
					<form>
						<!-- Name input -->
						<div class="form-outline mb-4">
							<input type="text" id="registerName" class="form-control" required />
							<label class="form-label" for="registerName">Name</label>
						</div>

						<!-- Username input -->
						<div class="form-outline mb-4">
							<input type="text" id="registerUsername" class="form-control" required />
							<label class="form-label" for="registerUsername">Username</label>
						</div>

						<!-- Email input -->
						<div class="form-outline mb-4">
							<input type="email" id="registerEmail" class="form-control" required />
							<label class="form-label" for="registerEmail">Email</label>
						</div>

						<!-- Password input -->
						<div class="form-outline mb-4">
							<input type="password" id="registerPassword" class="form-control" required />
							<label class="form-label" for="registerPassword">Password</label>
						</div>

						<!-- Repeat Password input -->
						<div class="form-outline mb-4">
							<input type="password" id="registerRepeatPassword" class="form-control" required />
							<label class="form-label" for="registerRepeatPassword">Repeat password</label>
						</div>

						<!-- Checkbox -->
						<div class="form-check d-flex justify-content-center mb-4">
							<input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
								aria-describedby="registerCheckHelpText" required />
							<label class="form-check-label" for="registerCheck">
								I have read and agree to the terms
							</label>
						</div>

						<!-- Submit button -->
						<button type="submit" class="btn btn-dark mb-3 w-100">Sign up</button>
					</form>
				</div>
			</div>
			<!-- Pills content -->
		</div>
	</div>

		<!-- Footer Section -->
		<footer class="bg-dark text-white pt-5 pb-4">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<h5>About Us</h5>
						<p>We offer a wide range of high-quality furniture for every home and office. Our products are designed for
							comfort and style.</p>
					</div>
					<div class="col-md-3">
						<h5>Customer Service</h5>
						<ul class="list-unstyled">
							<li><a href="#" class="text-white">Contact Us</a></li>
							<li><a href="#" class="text-white">Returns</a></li>
							<li><a href="#" class="text-white">FAQ</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h5>Follow Us</h5>
						<ul class="list-unstyled">
							<li><a href="#" class="text-white"><i class="fab fa-facebook"></i> Facebook</a></li>
							<li><a href="#" class="text-white"><i class="fab fa-twitter"></i> Twitter</a></li>
							<li><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h5>Payment Methods</h5>
						<ul class="list-unstyled">
							<li><i class="fab fa-visa"></i> Visa</li>
							<li><i class="fab fa-mastercard"></i> MasterCard</li>
							<li><i class="fab fa-paypal"></i> PayPal</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>

	<!-- Bootstrap 5 JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>


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
</body>

</html>