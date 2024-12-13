<!-- navbar.php -->
<nav class="navbar navbar-expand-sm navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="./">Furniture Store</a>
		<button
			class="navbar-toggler d-lg-none"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#collapsibleNavId"
			aria-controls="collapsibleNavId"
			aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavId">
			<ul class="navbar-nav me-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link active" href="<?= route('index') ?>" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./shop">Shop</a>
				</li>
			</ul>
			<form class="d-flex my-2 my-lg-0">
				<div class="input-group">
					<input class="form-control me-sm-2" type="text" placeholder="Search" aria-label="Search" />
					<button class="btn btn-outline-secondary" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</form>
			<ul class="navbar-nav ms-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa	-user"></i>
						<?= isLoggedIn() ? getUsername() : 'Guest' ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="userDropdown">
						<?php if (isLoggedIn()): ?>
							<!-- Show if logged in -->
							<a class="dropdown-item" href="<?= route('profile') ?>">Profile</a>
							<a class="dropdown-item" href="<?= route('logout') ?>">Logout</a>
						<?php else: ?>
							<!-- Show if not logged in -->
							<a class="dropdown-item" href="<?= route('signin') ?>"></a>
							<a class="dropdown-item" href="<?= route('signup') ?>">Signup</a>
						<?php endif; ?>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= route('cart') ?>">
						<i class="fas fa-shopping-cart"></i> Cart
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>