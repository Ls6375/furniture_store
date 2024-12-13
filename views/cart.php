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

    <!-- Alert message for item removal -->
    <div id="alert-container"></div>

    <!-- Check if there are cart items -->
    <?php if (!empty($cartItems)) : ?>
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($cartItems as $item) : ?>
                    <div class="cart-item row align-items-center" data-product-id="<?= $item['id'] ?>">
                        <div class="col-3">
                            <img src="<?= assets('uploads/'.$item['mainImage']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="img-fluid">
                        </div>
                        <div class="col-6">
                            <h5><?= htmlspecialchars($item['name']) ?></h5>
                            <p>Price: $<?= number_format($item['price'], 2) ?></p>
                        </div>
                        <div class="col-3">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-outline-dark update-quantity" type="button" data-action="decrease">-</button>
                                <input type="number" class="form-control text-center mx-2 quantity-input" value="<?= $item['quantity'] ?>" min="1" max="100" style="width: 60px;">
                                <button class="btn btn-outline-dark update-quantity" type="button" data-action="increase">+</button>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <span class="remove-item"><i class="fas fa-trash"></i> Remove</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-4">
                <div class="cart-summary">
                    <h5 class="mb-3">Cart Summary</h5>
                    <?php 
                    $subtotal = array_sum(array_column($cartItems, 'totalPrice'));
                    ?>
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span id="total1">$<?= number_format($subtotal, 2) ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span><strong>Total</strong></span>
                        <span><strong id="total">$<?= number_format($subtotal, 2) ?></strong></span>
                    </div>
                    <div class="mt-4">
                        <a  href="<?= route('checkout') ?>" class="btn btn-primary w-100 py-2">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>


<script>
// JS for handling cart update and removal
document.addEventListener('DOMContentLoaded', function () {
    // Handle quantity update
    document.querySelectorAll('.update-quantity').forEach(button => {
        button.addEventListener('click', function () {
            const cartItem = this.closest('.cart-item');
            const productId = cartItem.getAttribute('data-product-id');
            const quantityInput = cartItem.querySelector('.quantity-input');
            let quantity = parseInt(quantityInput.value);

            if (this.dataset.action === 'increase') {
                quantity++;
            } else if (this.dataset.action === 'decrease' && quantity > 1) {
                quantity--;
            }

            // Update input field
            quantityInput.value = quantity;

            // Make AJAX call to update the cart
            updateCart(productId, quantity);
        });
    });

    // Handle item removal
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function () {
            const cartItem = this.closest('.cart-item');
            const productId = cartItem.getAttribute('data-product-id');

            // Make AJAX call to remove the item
            removeFromCart(productId);
        });
    });

    // Update the cart and recalculate the total
    function updateCart(productId, quantity) {
        fetch('cart/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ productId, quantity })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);

            // Update the cart summary (subtotal and total)
            updateCartSummary();
        })
        .catch(error => {
            console.error('Error updating cart:', error);
        });
    }

    // Remove item from the cart and update the summary
    function removeFromCart(productId) {
        fetch('cart/remove', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ productId })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);

            // Remove item from DOM
            const cartItem = document.querySelector(`.cart-item[data-product-id="${productId}"]`);
            if (cartItem) {
                cartItem.remove();
            }

            // Display the alert message
            const alertContainer = document.getElementById('alert-container');
            const alertMessage = document.createElement('div');
            alertMessage.classList.add('alert', 'alert-success', 'mt-3');
            alertMessage.textContent = 'Item removed from your cart successfully.';
            alertContainer.appendChild(alertMessage);

            // Hide the alert after 3 seconds
            setTimeout(() => {
                alertMessage.remove();
            }, 3000);

            // Update the cart summary (subtotal and total)
            updateCartSummary();
        })
        .catch(error => {
            console.error('Error removing item:', error);
        });
    }

    // Fetch the updated cart total and update the UI
    function updateCartSummary() {
        fetch('cart/total')
            .then(response => response.json())
            .then(data => {
                const totalElement = document.querySelector('#total');
                const totalElement1 = document.querySelector('#total1');
								
                // Update the total value in the UI
                if (totalElement) {
                    totalElement.textContent = '$' + data.total.toFixed(2);
                }

								if (totalElement1) {
									totalElement1.textContent = '$' + data.total.toFixed(2);
                }

            })
            .catch(error => {
                console.error('Error fetching cart total:', error);
            });
    }
});
</script>


<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>
