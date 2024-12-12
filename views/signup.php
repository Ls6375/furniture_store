<?php
$pageTitle = 'Sign up Page';

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

<!-- Sign up Page Section -->
<div class="d-flex justify-content-center align-items-center mb-5">
    <div class="container mt-5 p-4 border rounded shadow-sm" style="max-width: 500px; width: 100%;">
        <h1 class="text-primary text-center">Sign up</h1>
        
        <!-- Display success message -->
        <?php if ($success ?? false) : ?>
            <div class="alert alert-success">
                <?= $success ?>
            </div>
        <?php endif; ?>

        <!-- Display error messages -->
        <!-- <?php if ($errors ?? false) : ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?> -->

        <!-- Register form -->
        <form method="POST" action="signup">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="registerName">Name</label>
                <input type="text" name="name" id="registerName" class="form-control" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" />
                <?php if ($errors['name'] ?? false) : ?>
                    <small class="text-danger"><?= $errors['name'] ?></small>
                <?php endif; ?>
            </div>

            <!-- Username input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="registerUsername">Username</label>
                <input type="text" name="username" id="registerUsername" class="form-control" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" />
                <?php if ($errors['username'] ?? false) : ?>
                    <small class="text-danger"><?= $errors['username'] ?></small>
                <?php endif; ?>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="registerEmail">Email</label>
                <input type="email" name="email" id="registerEmail" class="form-control" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
                <?php if ($errors['email'] ?? false) : ?>
                    <small class="text-danger"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="registerPassword">Password</label>
                <input type="password" name="password" id="registerPassword" class="form-control" />
                <?php if ($errors['password'] ?? false) : ?>
                    <small class="text-danger"><?= $errors['password'] ?></small>
                <?php endif; ?>
            </div>

            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="registerRepeatPassword">Repeat Password</label>
                <input type="password" name="repeatPassword" id="registerRepeatPassword" class="form-control" />
                <?php if ($errors['repeatPassword'] ?? false) : ?>
                    <small class="text-danger"><?= $errors['repeatPassword'] ?></small>
                <?php endif; ?>
            </div>

            <!-- Submit button -->
            <button type="submit" name="register" class="btn btn-dark mb-3 w-100">Sign up</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>
