<?php
$pageTitle = 'Furniture Category Management CMS';

$extraHead = <<<HTML
<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
HTML;

ob_start();
?>

<!-- Main Content -->
<div id="content">

    <div class="my-5"></div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Furniture Category Management</h1>
        </div>

        <!-- Add Category Form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
            </div>
            <div class="card-body">

                <!-- Display success message -->
                <?php if ($success ?? false) : ?>
                    <div class="alert alert-success">
                        <?= $success ?>
                    </div>
                <?php endif; ?>

								<?php if ($errors['general'] ?? false) : ?>
                    <div class="alert alert-danger">
                        <?= $errors['general'] ?>
                    </div>
                <?php endif; ?>

								

                <form id="categoryForm" action="<?= route('admin/categories') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control <?= isset($errors['categoryName']) ? 'is-invalid' : '' ?>" id="categoryName" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" >
                        <?php if (isset($errors['categoryName'])): ?>
                            <div class="invalid-feedback"><?= $errors['categoryName'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="categoryImage">Category Image</label>
                        <input type="file" accept="image/*" class="form-control-file <?= isset($errors['categoryImage']) ? 'is-invalid' : '' ?>" id="categoryImage" name="image">
                        <?php if (isset($errors['categoryImage'])): ?>
                            <div class="invalid-feedback"><?= $errors['categoryImage'] ?></div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Category</button>
                </form>
            </div>
        </div>

        <!-- Category List -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            </div>
            <div class="card-body">
                <table id="categoryTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($categories)): ?>
                            <tr>
                                <td colspan="4" class="text-center">No data found</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= htmlspecialchars($category['id']) ?></td>
                                    <td><?= htmlspecialchars($category['name']) ?></td>
                                    <td>
                                        <?php if (!empty($category['image'])): ?>
                                            <img src="<?= htmlspecialchars(assets('uploads/' . $category['image'])) ?>" alt="<?= htmlspecialchars($category['name']) ?>" width="50">
                                        <?php else: ?>
                                            No image
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="<?= route('admin/category-edit') ?>" method="POST" style="display:inline;" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($category['id']) ?>">
                                            <input type="text" name="name" value="<?= htmlspecialchars($category['name']) ?>">
                                            <input type="file" accept="image/*" name="image">
                                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                        </form>
                                        <form action="<?= route('admin/category-delete') ?>" method="POST" style="display:inline;">
																				<input type="hidden" name="id" value="<?= htmlspecialchars($category['id']) ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- DataTable Initialization Script -->
<?php

$extraScripts = <<<HTML
 <script>
     $(document).ready(function() {
         // Initialize DataTable
         $('#categoryTable').DataTable();
     });
 </script>
HTML;

?>

<?php
$content = ob_get_clean();
require_once  __DIR__  . '/../' . 'layouts/admin_layout.php';
?>
