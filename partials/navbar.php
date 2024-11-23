<!-- navbar.php -->
<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Furniture Store</a>
    <button
      class="navbar-toggler d-lg-none"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#collapsibleNavId"
      aria-controls="collapsibleNavId"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./shop.php">Shop</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
          <div class="dropdown-menu" aria-labelledby="dropdownId">
            <a class="dropdown-item" href="#">Chairs</a>
            <a class="dropdown-item" href="#">Tables</a>
            <a class="dropdown-item" href="#">Sofas</a>
          </div>
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
            <i class="fas fa-user"></i> Account
          </a>
          <div class="dropdown-menu" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="./login.php">Sign In</a>
            <a class="dropdown-item" href="#">Sign Up</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./cart.php">
            <i class="fas fa-shopping-cart"></i> Cart
            <span class="badge bg-danger">3</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
