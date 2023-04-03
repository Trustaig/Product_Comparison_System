<?php
include 'SessionNavbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Guide</title>
</head>

<body>
<main class="flex-shrink-0">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>User Guide</h2>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Searching for your product
                </h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box" data-aos="zoom-in-left">
                        <div class="icon"><i class="bi-clipboard-check-fill" style="color: #ff689b;"></i></div>
                        <h4 class="title">Categories</a></h4>
                        <p class="description">If you are not sure what you are looking for, head over to the
                            categories section to narrow down on your search.</p>
                        <p class="description">You can do this by going to the Navbar, clicking on 'Categories'
                            and proceeding from there.</p><br>
                        <p class="description">Head over now with the link below:</p>

                        <?php if (isset($_SESSION['user_id'])) { ?>
                        <h4><a href="landing_page.php #Categories" class="details-link" title="More Details"></h4>
                        <p class="description">Explore our collection.</p>
                        <?php } else {
                            echo ' <h4><a href="index.php #Categories" class="details-link" title="More Details"></h4>
                        <p class="description">Explore our collection.</p>';
                        }
                        ?>
                        <a href="#" class="details-link" title="Explore"></i></a>

                        <br><br><br>
                        <div class="product-img"><img src="assets/img/portfolio/categories.jpg" class="img-fluid"
                                                      alt="">
                            <a href="assets/img/portfolio/categories.jpg" data-gallery="portfolioGallery" class=
                            "portfolio-lightbox preview-link"
                               title="Categories"><br><br><br><br><br><span>MAGNIFY PHOTO</span></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                        <div class="icon"></div>
                        <h4 class="title">Product specification and Reviews</a></h4>
                        <p class="description">If you have been searching and can not make your mind up, try out
                            and read some reviews and view device specifications which allows you to make your mind
                            up.</p>
                        <br>
                        <p class="description">From there you can also buy the product directly from the retailer
                            - saving you some hassle.</p>
                        <?php if (isset($_SESSION['user_id'])) { ?>
                        <h4><a href="compare.php" class="details-link" title="More Details"></h4>
                        <p class="description">Try it out here.</p>
                        <?php } else {
                            echo ' <h4><a href="register.php" class="details-link" title="More Details"></h4>
                        <p class="description">Try it out here.</p>';
                        }
                        ?>
                        <a href="#" class="details-link" title="Explore"></i></a>

                        <br><br>
                        <div class="product-img"><img src="assets/img/portfolio/specs.jpg" class="img-fluid"
                                                      alt="">
                            <a href="assets/img/portfolio/specs.jpg" data-gallery="portfolioGallery" class=
                            "portfolio-lightbox preview-link"
                               title="Specifications"><br><br><span>MAGNIFY PHOTO</span></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
                        <h4 class="title">Your Favourites</a></h4>
                        <p class="description">Seen an item you like and don't want to miss it?</p><br>
                        <p class="description">Hit the 'Add to Favourites' button right away and view it later
                            from your dashboard where you can either compare it, leave a review or buy it right
                            away!</p><br>
                        <?php if (isset($_SESSION['user_id'])) { ?>
                        <h4><a href="favourites.php" class="details-link" title="More Details"></h4>
                        <p class="description">Try it out here.</p>
                        <?php } else {
                            echo ' <h4><a href="register.php" class="details-link" title="More Details"></h4>
                        <p class="description">Try it out here.</p>';
                        }
                        ?>
                        <a href="#" class="details-link" title="Explore"></i></a

                        <br><br><br><br><br><br>
                        <div class="product-img"><img src="assets/img/portfolio/favourites.jpg" class="img-fluid"
                                                      alt="">
                            <a href="assets/img/portfolio/favourites.jpg" data-gallery="portfolioGallery" class=
                            "portfolio-lightbox preview-link"
                               title="Favourites"><span><br><br><br><br>MAGNIFY PHOTO</span></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Services Section -->

</main>
</body>
</html>

<?php
include 'footer.php';
?>
