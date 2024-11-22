<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Cart</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    .cart-item {
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
    }
    .cart-item img {
      max-width: 100px;
      object-fit: cover;
    }
    .remove-item {
      cursor: pointer;
      color: red;
    }
    .cart-summary {
      border-radius: 5px;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .quantity-control button {
      width: 40px;
    }
    .btn-outline-dark {
      border-color: #ddd;
    }
  </style>
</head>
<body class="bg-light">
<?php include 'partials/navbar.php'; ?>

  <div class="container py-5">
    <h1 class="text-center mb-5">Your Cart</h1>

    <!-- Cart List -->
    <div class="row">
      <div class="col-md-8">
        <!-- Cart Item 1 -->
        <div class="cart-item row align-items-center">
          <div class="col-3">
            <img src="https://assets.weimgs.com/weimgs/rk/images/wcm/products/202437/0006/open-box-mid-century-upholstered-dining-chair-wood-legs-m.jpg" alt="Product 1">
          </div>
          <div class="col-6">
            <h5>Chair</h5>
            <p>$25.00</p>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center">
              <!-- Quantity Control -->
              <button class="btn btn-outline-dark" type="button">-</button>
              <input type="number" class="form-control text-center mx-2" value="1" min="1" max="100" style="width: 60px;">
              <button class="btn btn-outline-dark" type="button">+</button>
            </div>
          </div>
          <div class="col-12 text-end">
            <span class="remove-item"><i class="fas fa-trash"></i> Remove</span>
          </div>
        </div>

        <!-- Cart Item 2 -->
        <div class="cart-item row align-items-center">
          <div class="col-3">
            <img src="https://berre.ca/cdn/shop/products/bailey-dining-table-112477.jpg?v=1683054216&width=800" alt="Product 2">
          </div>
          <div class="col-6">
            <h5>Table</h5>
            <p>$45.00</p>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center">
              <!-- Quantity Control -->
              <button class="btn btn-outline-dark" type="button">-</button>
              <input type="number" class="form-control text-center mx-2" value="1" min="1" max="100" style="width: 60px;">
              <button class="btn btn-outline-dark" type="button">+</button>
            </div>
          </div>
          <div class="col-12 text-end">
            <span class="remove-item"><i class="fas fa-trash"></i> Remove</span>
          </div>
        </div>

        <!-- Cart Item 3 -->
        <div class="cart-item row align-items-center">
          <div class="col-3">
            <img src="http://localhost/php/Group_project/images/soffa.jpg" alt="Product 3">
          </div>
          <div class="col-6">
            <h5>Soffa</h5>
            <p>$35.00</p>
          </div>
          <div class="col-3">
            <div class="d-flex align-items-center">
              <!-- Quantity Control -->
              <button class="btn btn-outline-dark" type="button">-</button>
              <input type="number" class="form-control text-center mx-2" value="1" min="1" max="100" style="width: 60px;">
              <button class="btn btn-outline-dark" type="button">+</button>
            </div>
          </div>
          <div class="col-12 text-end">
            <span class="remove-item"><i class="fas fa-trash"></i> Remove</span>
          </div>
        </div>

      </div>

      <!-- Cart Summary -->
      <div class="col-md-4">
        <div class="cart-summary">
          <h5 class="mb-3">Cart Summary</h5>
          <div class="d-flex justify-content-between">
            <span>Subtotal</span>
            <span>$105.00</span>
          </div>
          <div class="d-flex justify-content-between">
            <span>Shipping</span>
            <span>Free</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between">
            <span><strong>Total</strong></span>
            <span><strong>$105.00</strong></span>
          </div>
          <div class="mt-4">
            <button class="btn btn-primary w-100 py-2">Proceed to Checkout</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'partials/footer.php'; ?>
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
