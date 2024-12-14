<?php
$pageTitle = 'Order History';

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

<!-- Order History -->
<div class="container py-5">
    <h1 class="text-center mb-5">Order History</h1>

    <div class="row">
        <div class="col-md-12">
            <!-- Display success message -->
            <?php if ($success ?? false) : ?>
                <div class="alert alert-success">
                    <?= $success ?>
                </div>
            <?php endif; ?>

            <!-- Display general errors -->
            <?php if ($errors['general'] ?? false) : ?>
                <div class="alert alert-danger">
                    <?= $errors['general'] ?>
                </div>
            <?php endif; ?>

            <!-- Order History Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= htmlspecialchars($order['order_id']) ?></td>
                            <td><?= htmlspecialchars($order['created_at']) ?></td>
                            <td><?= htmlspecialchars($order['order_status']) ?></td>
                            <td><?= htmlspecialchars($order['address'], 2) ?></td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#orderDetails<?= $order['order_id'] ?>" aria-expanded="false" aria-controls="orderDetails<?= $order['order_id'] ?>">
                                    View Details
                                </button>
                            </td>
                        </tr>
                        <tr class="collapse" id="orderDetails<?= $order['order_id'] ?>">
                            <td colspan="5">
                                <div class="card card-body">
                                    <h5>Order Items</h5>
                                    <ul class="list-group">
                                    <li class="list-group-item">
                    <strong>First Name:</strong> <?= htmlspecialchars($order['firstName']) ?>
                </li>
                <li class="list-group-item">
                    <strong>Email:</strong> <?= htmlspecialchars($order['email']) ?>
                </li>
                <li class="list-group-item">
                    <strong>Phone:</strong> <?= htmlspecialchars($order['phone']) ?>
                </li>
                <li class="list-group-item">
                    <strong>City:</strong> <?= htmlspecialchars($order['city']) ?>
                </li>
                <li class="list-group-item">
                    <strong>State:</strong> <?= htmlspecialchars($order['state']) ?>
                </li>
                <li class="list-group-item">
                    <strong>Zip Code:</strong> <?= htmlspecialchars($order['zipCode']) ?>
                </li>
                <li class="list-group-item">
                    <strong>Card Name:</strong> <?= htmlspecialchars($order['cardName']) ?>
                </li>
                <li class="list-group-item">
                    <strong>Card Number:</strong> <?= htmlspecialchars($order['cardNumber']) ?>
                </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                  
                        
                </tbody>
            </table>
      
        </div>
    </div>       
</div>

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>
