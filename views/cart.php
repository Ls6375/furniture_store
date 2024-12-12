<?php
$pageTitle = 'Cart Page';

$extraHead = <<<HTML
<link rel="stylesheet" href="./public/assets/style.css" />
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

<!-- Cart -->
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

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>