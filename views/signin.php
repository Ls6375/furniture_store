<?php
$pageTitle = 'Sign In Page';

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

<!-- Login Page Section -->
<div class="d-flex justify-content-center align-items-center mb-5">
    <div class="container mt-5 p-4 border rounded shadow-sm" style="max-width: 500px; width: 100%;">
        <h1 class="text-primary text-center">Sign In</h1>
        
        <!-- Display success message -->
        <?php if ($success ?? false) : ?>
            <div class="alert alert-success">
                <?= $success ?>
            </div>
        <?php endif; ?>
        
        <!-- Display errors -->
        <?php if ($errors ?? false) : ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Login form -->
        <form method="POST" action="signin">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="loginEmail">Email</label>
                <input type="email" name="email" id="loginEmail" class="form-control" value="<?= htmlspecialchars($email ?? '') ?>" />
								<?php if ($errors['email'] ?? false) : ?>
                    <small class="text-danger"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="loginPassword">Password</label>
                <input type="password" name="password" id="loginPassword" class="form-control" />
								<?php if ($errors['password'] ?? false) : ?>
                    <small class="text-danger"><?= $errors['password'] ?></small>
                <?php endif; ?>
            </div>

            <!-- Submit button -->
            <button type="submit" name="login" class="btn btn-dark mb-3 w-100">Sign in</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>
