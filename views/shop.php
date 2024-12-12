<?php
$pageTitle = 'Shop Page';

$extraHead = <<<HTML
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXX');
</script>
HTML;

// Get filter query parameters
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$priceFilter = isset($_GET['price']) ? $_GET['price'] : 500;  // Default to 500 if no filter

// Filter products based on selected filters
$filteredProducts = array_filter($products, function ($product) use ($categoryFilter, $priceFilter) {
    // Filter by category if selected
    if ($categoryFilter && $product['category'] !== $categoryFilter) {
        return false;
    }
    // Filter by price if selected
    if ($product['price'] > $priceFilter) {
        return false;
    }
    return true;
});

ob_start();
?>

    <!-- Shop Section with Heading and Paragraph -->
    <div class="container mt-5 text-left">
        <div class="row">
            <div class="col">
                <!-- Heading -->
                <h1 class="display-4 mb-2">Shop Our Collection</h1>

                <!-- Paragraph -->
                <p class="lead mb-3">
                    Explore our wide range of products including the latest fashion, accessories, and exclusive deals. Find what
                    you need and enjoy a seamless shopping experience.
                </p>
            </div>
        </div>
    </div>

    <!-- Shop -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-md-3">
                <div class="card p-3 position-sticky" style="top: 20px;">
                    <h5>Filters</h5>

                    <!-- Category Filter -->
                    <h6>Category</h6>
                    <form method="get">
                        <select class="form-select mb-3" name="category">
                            <option value="">Choose Category</option>
                            <option value="Chair" <?= ($categoryFilter == 'Chair') ? 'selected' : ''; ?>>Chair</option>
                            <option value="Sofa" <?= ($categoryFilter == 'Sofa') ? 'selected' : ''; ?>>Sofa</option>
                            <option value="Table" <?= ($categoryFilter == 'Table') ? 'selected' : ''; ?>>Table</option>
                            <option value="Bed" <?= ($categoryFilter == 'Bed') ? 'selected' : ''; ?>>Bed</option>
                        </select>

                        <!-- Price Range Filter -->
                        <h6>Price</h6>
                        <input type="range" class="form-range" min="0" max="500" step="1" id="priceRange" name="price" value="<?= $priceFilter; ?>" oninput="updatePriceLabel()">
                        <label for="priceRange" id="priceLabel">Price: $0 - $<?= $priceFilter; ?></label>

                        <button type="submit" class="btn btn-dark w-100 mt-3">Apply Filters</button>
                        <a href="./shop.php" class="btn btn-dark w-100 mt-3">Reset Filters</a>
                    </form>
                </div>
            </div>

            <!-- Product Listings -->
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($filteredProducts as $product): ?>
                        <div class="col">
                            <div class="card border-0 rounded-3 shadow-sm h-100">
                                <img src="<?= assets('uploads/' . $product['mainImage']	) ?>" class="card-img-top rounded-3" alt="<?= $product['name']; ?>" style="object-fit: cover; height: 180px;">
                                <div class="card-body d-flex flex-column justify-content-between p-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5 class="card-title text-dark mb-0"><?= $product['name']?></h5>
                                    </div>
                                    <p class="card-text text-dark fs-5 mb-3">$<?= number_format($product['price'], 2); ?></p>
                                    <a href="<?= route('cart')?>" class="btn btn-dark w-100 mb-1 py-2 rounded-3">Add to Cart</a>
																		<a href="<?= route('product_detail/' .  $product['slug'])?>" class="btn btn-dark w-100 py-2 rounded-3">View Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Centered Pagination (Optional) -->
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Product pagination">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
require_once 'layouts/user_layout.php';
?>
