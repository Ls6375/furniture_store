<?php
$pageTitle = 'Checkout';

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

echo '<pre>';
print_r($errors);
echo '</pre>';
ob_start();
?>

<!-- Checkout -->
<div class="container py-5">
	<h1 class="text-center mb-5">Checkout</h1>

	<div class="row">
		<div class="col-md-8">
			<!-- Display success message -->
			<?php if ($success ?? false) : ?>
				<div class="alert alert-success">
					<?= $success ?>
				</div>
			<?php endif; ?>

			<?php
			echo '<pre>';
			print_r($errors);
			print_r($old);
			echo '</pre>';
			?>
			<!-- Display general errors -->
			<?php if ($errors['general'] ?? false) : ?>
				<div class="alert alert-danger">
					<?= $errors['general'] ?>
				</div>
			<?php endif; ?>

			<!-- Checkout Form -->
			<form id="checkoutForm" action="<?= route('checkout') ?>" method="POST">
				<div class="mb-4">
					<h4>Billing Information</h4>
					<div class="row">

						<div class="col-md-6 mb-3">

							<label for="firstName" class="form-label">Name</label>
							
							<input type="text" class="form-control <?= isset($errors['firstName']) ? 'is-invalid' : '' ?>" id="firstName" name="firstName" value="<?= htmlspecialchars($old['firstName'] ?? '') ?>">
							<?php if (isset($errors['firstName'])): ?>
								<div class="invalid-feedback"><?= $errors['firstName'] ?></div>
							<?php endif; ?>
						</div>
						<div class="mb-3 col-md-6">
							<label for="email" class="form-label">Email Address</label>
							<input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
							<?php if (isset($errors['email'])): ?>
								<div class="invalid-feedback"><?= $errors['email'] ?></div>
							<?php endif; ?>
						</div>
					</div>
					<div class="mb-3">
						<label for="phone" class="form-label">Phone Number</label>
						<input type="tel" class="form-control <?= isset($errors['phone']) ? 'is-invalid' : '' ?>" id="phone" name="phone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
						<?php if (isset($errors['phone'])): ?>
							<div class="invalid-feedback"><?= $errors['phone'] ?></div>
						<?php endif; ?>
					</div>
					<div class="mb-3">
						<label for="address" class="form-label">Street Address</label>
						<input type="text" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>" id="address" name="address" value="<?= htmlspecialchars($old['address'] ?? '') ?>">
						<?php if (isset($errors['address'])): ?>
							<div class="invalid-feedback"><?= $errors['address'] ?></div>
						<?php endif; ?>
					</div>

					<div class="mb-3">
						<label for="city" class="form-label">City</label>
						<input type="text" class="form-control <?= isset($errors['city']) ? 'is-invalid' : '' ?>" id="city" name="city" value="<?= htmlspecialchars($old['city'] ?? '') ?>">
						<?php if (isset($errors['city'])): ?>
							<div class="invalid-feedback"><?= $errors['city'] ?></div>
						<?php endif; ?>
					</div>

					<div class="mb-3">
						<label for="state" class="form-label">State</label>
						<input type="text" class="form-control <?= isset($errors['state']) ? 'is-invalid' : '' ?>" id="state" name="state" value="<?= htmlspecialchars($old['state'] ?? '') ?>">
						<?php if (isset($errors['state'])): ?>
							<div class="invalid-feedback"><?= $errors['state'] ?></div>
						<?php endif; ?>
					</div>

					<div class="mb-3">
						<label for="zipCode" class="form-label">Zip Code</label>
						<input type="text" class="form-control <?= isset($errors['zipCode']) ? 'is-invalid' : '' ?>" id="zipCode" name="zipCode" value="<?= htmlspecialchars($old['zipCode'] ?? '') ?>">
						<?php if (isset($errors['zipCode'])): ?>
							<div class="invalid-feedback"><?= $errors['zipCode'] ?></div>
						<?php endif; ?>
					</div>

				</div>

				<div class="mb-4">
					<h4>Payment Information</h4>
					<div class="mb-3">
						<label for="cardName" class="form-label">Name on Card</label>
						<input type="text" class="form-control <?= isset($errors['cardName']) ? 'is-invalid' : '' ?>" id="cardName" name="cardName" value="<?= htmlspecialchars($old['cardName'] ?? '') ?>">
						<?php if (isset($errors['cardName'])): ?>
							<div class="invalid-feedback"><?= $errors['cardName'] ?></div>
						<?php endif; ?>
					</div>
					<div class="mb-3">
						<label for="cardNumber" class="form-label">Card Number</label>
						<input type="text" class="form-control <?= isset($errors['cardNumber']) ? 'is-invalid' : '' ?>" id="cardNumber" name="cardNumber" value="<?= htmlspecialchars($old['cardNumber'] ?? '') ?>">
						<?php if (isset($errors['cardNumber'])): ?>
							<div class="invalid-feedback"><?= $errors['cardNumber'] ?></div>
						<?php endif; ?>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="expiration" class="form-label">Expiration Date</label>
							<input type="text" class="form-control <?= isset($errors['expiration']) ? 'is-invalid' : '' ?>" id="expiration" name="expiration" value="<?= htmlspecialchars($old['expiration'] ?? '') ?>">
							<?php if (isset($errors['expiration'])): ?>
								<div class="invalid-feedback"><?= $errors['expiration'] ?></div>
							<?php endif; ?>
						</div>
						<div class="col-md-4 mb-3">
							<label for="cvv" class="form-label">CVV</label>
							<input type="text" class="form-control <?= isset($errors['cvv']) ? 'is-invalid' : '' ?>" id="cvv" name="cvv" value="<?= htmlspecialchars($old['cvv'] ?? '') ?>">
							<?php if (isset($errors['cvv'])): ?>
								<div class="invalid-feedback"><?= $errors['cvv'] ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<button type="submit" class="btn btn-primary w-100 py-2">Complete Order</button>
			</form>
		</div>

		<!-- Order Summary -->
		<div class="col-md-4">
			<div class="cart-summary">
				<h5 class="mb-3">Order Summary</h5>
				<div class="d-flex justify-content-between">
					<span>Subtotal</span>
					<span><?php echo '$' . number_format($totalPrice, 2); ?></span> <!-- Displaying the calculated subtotal -->
				</div>
				<div class="d-flex justify-content-between">
					<span>Shipping</span>
					<span>Free</span>
				</div>
				<hr>
				<div class="d-flex justify-content-between">
					<span><strong>Total</strong></span>
					<span><strong><?php echo '$' . number_format($totalPrice, 2); ?></strong></span> <!-- Grand Total -->
				</div>
				<div class="mt-4">
					<button type="submit" form="checkoutForm" class="btn btn-primary w-100 py-2">Complete Order</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>