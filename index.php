<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- FontAwesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
      integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Furniture Store</title>
  </head>

  <body>
    <!-- Navbar -->
    <?php include 'partials/navbar.php'; ?>
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Carousel -->
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li
          data-bs-target="#carouselId"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="First slide"
        ></li>
        <li
          data-bs-target="#carouselId"
          data-bs-slide-to="1"
          aria-label="Second slide"
        ></li>
        <li
          data-bs-target="#carouselId"
          data-bs-slide-to="2"
          aria-label="Third slide"
        ></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img
            src="images/s1.webp"
            class="w-100 d-block"
            alt="Modern Sofa Set"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Discover Modern Comfort</h5>
            <p>
              Explore our exclusive collection of contemporary sofa sets
              designed for elegance and comfort.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="images/s2.webp"
            class="w-100 d-block"
            alt="Elegant Dining Table"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Relax in Comfort</h5>
            <p>
              Transform your bedroom into a haven of relaxation with our cozy
              and stylish furniture.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="images/s3.webp"
            class="w-100 d-block"
            alt="Cozy Bedroom Setup"
          />
          <div class="carousel-caption d-none d-md-block">
            <h5>Dining in Style</h5>
            <p>
              Upgrade your dining experience with our range of luxurious dining
              tables and chairs.
            </p>
          </div>
        </div>
      </div>

      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselId"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselId"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Category -->
    <section class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center mb-4">Shop by Category</h2>
        <!-- Text below the heading -->
        <p class="text-center text-muted mb-4">
          Explore our wide range of high-quality furniture items tailored for
          every home and office.
        </p>
        <div class="row g-4">
          <!-- Chairs Category -->
          <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm">
              <!-- Full-width image using Holder.js -->
              <img
                src="https://assets.weimgs.com/weimgs/rk/images/wcm/products/202437/0006/open-box-mid-century-upholstered-dining-chair-wood-legs-m.jpg"
                class="img-fluid"
                alt="Chairs"
              />
              <div class="card-body">
                <h5 class="card-title">Chairs</h5>
                <a href="./product_detail.php" class="btn btn-light"
                  >Shop Now</a
                >
              </div>
            </div>
          </div>
          <!-- Tables Category -->
          <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm">
              <!-- Full-width image using Holder.js -->
              <img
                src="https://berre.ca/cdn/shop/products/bailey-dining-table-112477.jpg?v=1683054216&width=800"
                class="img-fluid"
                alt="Tables"
              />
              <div class="card-body">
                <h5 class="card-title">Tables</h5>
                <a href="./product_detail.php" class="btn btn-light"
                  >Shop Now</a
                >
              </div>
            </div>
          </div>
          <!-- Sofas Category -->
          <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm">
              <!-- Full-width image using Holder.js -->
              <img src="images/soffa.jpg" class="img-fluid" alt="Sofas" />
              <div class="card-body">
                <h5 class="card-title">Sofas</h5>
                <a href="./product_detail.php" class="btn btn-light"
                  >Shop Now</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Latest Arrivals -->
    <section class="py-5 bg-light">
      <div class="container">
        <!-- Main Header -->
        <h2 class="text-center mb-4">Latest Arrivals</h2>

        <!-- Text below the heading -->
        <p class="text-center text-muted mb-4">
          Discover the newest and most stylish pieces for your home and office.
        </p>

        <!-- Row for images -->
        <div class="row g-4 align-items-baseline">
          <!-- Left Image -->
          <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm">
              <img
                src="images/image.png"
                class="img-fluid"
                alt="Left Image"
                style="height: 100%; object-fit: cover"
              />
            </div>
          </div>

          <!-- Center (Larger) Image -->
          <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm mb-4">
              <img
                src="images/newarrival.jpg"
                class="img-fluid"
                alt="Main Image"
                style="height: 100%; object-fit: cover"
              />
            </div>
          </div>

          <!-- Right Image -->
          <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm">
              <img
                src="images/twist-stripes-rug-707475.jpg"
                class="img-fluid"
                alt="Right Image"
                style="height: 100%; object-fit: cover"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer Section -->
    <?php include 'partials/footer.php'; ?>

    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!-- Holder.js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"
      integrity="sha512-O6R6IBONpEcZVYJAmSC+20vdsM07uFuGjFf0n/Zthm8sOFW+lAq/OK1WOL8vk93GBDxtMIy6ocbj6lduyeLuqQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script>
      Holder.addTheme("dark", {
        bg: "#000",
        fg: "#aaa",
        size: 11,
        font: "Monaco",
        fontweight: "normal",
      });
    </script>
  </body>
</html>
