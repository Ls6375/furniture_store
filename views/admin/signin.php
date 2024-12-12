<?php
$pageTitle = 'Admin Home Page';
$hide_navbar = true;

$extraHead = '';

ob_start();
?>
<!-- Main Content -->
<div id="content">

    <div class="my-5"></div>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>

                                        <?php if (!empty($success)): ?>
                                            <div class="alert alert-success"> 
                                                <?= htmlspecialchars($success) ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($errors['login'])): ?>
                                            <div class="alert alert-danger"> 
                                                <?= htmlspecialchars($errors['login']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <form class="user" method="post" action="./signin">
                                        <div class="form-group">
                                            <input type="email" 
                                                   class="form-control form-control-user <?= !empty($errors['email']) ? 'is-invalid' : '' ?>" 
                                                   name="email" 
                                                   id="exampleInputEmail" 
                                                   aria-describedby="emailHelp" 
                                                   placeholder="Enter Email Address..." 
                                                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                            
                                            <?php if (!empty($errors['email'])): ?>
                                                <div class="invalid-feedback">
                                                    <?= htmlspecialchars($errors['email']) ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" 
                                                   class="form-control form-control-user <?= !empty($errors['password']) ? 'is-invalid' : '' ?>" 
                                                   name="password" 
                                                   id="exampleInputPassword" 
                                                   placeholder="Password">
                                            
                                            <?php if (!empty($errors['password'])): ?>
                                                <div class="invalid-feedback">
                                                    <?= htmlspecialchars($errors['password']) ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
$content = ob_get_clean();
require_once  __DIR__  . '/../' . 'layouts/admin_layout.php';
?>