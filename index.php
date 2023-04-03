<?php
include 'SessionNavbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<title>TechBuy</title>
<link href="assets/css/style.css" rel="stylesheet">


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel">
            <div class="carousel-container">
                <div class="logo" data-aos="zoom-out">
                    <img src="assets/img/TechBuy_Logo_nbg.jpeg" alt="TechBuy Logo"
                         style="width: 380px; display: block; margin: 0 auto;">
                </div>
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>TechBuy</span></h2>
                <p class="animate__animated fanimate__adeInUp">Search for any technology device currently available
                    across multiple markets at the best prices!</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
        </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>

</section>
<!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="register_header">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>About</h2>
                <p>Our Mission</p>
            </div>

            <div class="row content" data-aos="fade-up">
                <div class="col-lg-6">
                    <p>
                        Welcome to our website, the ultimate solution for managing and finding the best deals on
                        technological devices.
                        Our goal is to provide our customers with a one-stop-shop for all their technology needs while
                        saving them time and money.
                    </p>
                    <p>We believe that technology should be accessible and affordable for everyone, which is why we've
                        created a platform that will always provide you the cheapest prices on a wide range of devices, from laptops and smartphones to
                        gaming consoles and smart home devices.
                        Our comparison system ensures that our customers have access to the latest and
                        best technological devices, all at the most competitive prices.
                    </p>

                    <p>Whether you're in need of a new device for personal or business use, our team is dedicated to
                        finding you the perfect device that fits your needs and budget. Join us on our mission to simplify
                        technology and make it accessible for all. Let us handle the hassle of finding the best deal for you.
                    </p>
                    </p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h2>Don't have an account?</h2>

                    <p>
                        Here is why you should register.
                    </p>
                    <a href="user_guide.php" class="btn-learn-more">Learn About our Features!</a>
                    <a href="register.php" class="btn-learn-more">Register Now!</a>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Services</h2>
                <p>What we do offer</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box" data-aos="zoom-in-left">
                        <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                        <h4 class="title">Compare Prices</a></h4>
                        <p class="description">Our website offers you the ability to compare
                            prices and products across multiple retailers. No longer do you need to visit each
                            retailer's website individually to see what they're offering - our site gathers all
                            the information you need in one place. </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
                        <h4 class="title">Product Reviews and Ratings</a></h4>
                        <p class="description">We believe that informed shopping is smart shopping, which is why we've
                            incorporated product reviews and ratings into our website. Our users are encouraged to leave
                            honest reviews of the products they've purchased, so you can get a real sense of what others
                            think before making your own purchase.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
                        <h4 class="title">Buy Directly from the Retailer</a></h4>
                        <p class="description">When shopping online, security is always a top concern. That's why here at
                            Techbuy, only allow you buy directly from the retailer. This means that when you find
                            the product you want, you can choose to make the purchase directly on the retailer's website.
                            This not only provides an added layer of security by not having to enter your bank details
                            on new or unfamiliar sites, but it also allows you to take advantage of any
                            retailer-specific deals or promotions that may not be available on our site.</p>
                    </div>
                </div>
        </div>
    </section><!-- End Services Section -->




    <!-- ======= Categories Section ======= -->
    <section id="Categories" class="Categories">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Categories</h2>
                <p>FIND THE BEST VALUE FOR YOUR MONEY</p>
            </div>

            <div class="row categories-container" data-aos="fade-up">

                <div class="col-lg-4 col-md-6 product-item filter-app">
                    <div class="product-img"><img src="assets/img/portfolio/thumbnail-1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="product-info">
                        <h4><a href="phones.php" class="details-link" title="More Details"></h4>
                        <h4>Phones</h4>
                        <p>Explore our collection of mobile phones.</p>
                        <a href="phones.php" class="details-link" title="More Details"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 product-item filter-app">
                    <div class="product-img"><img src="assets/img/portfolio/thumbnail-2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="product-info">
                        <h4><a href="laptops.php" class="details-link" title="More Details"></h4>
                        <h4>Laptops</h4>
                        <p>Explore our collection of laptops.</p>
                        <a href="laptops.php" class="details-link" title="More Details"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 product-item filter-app">
                    <div class="product-img"><img src="assets/img/portfolio/thumbnail-3.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="product-info">
                        <h4><a href="others.php" class="details-link" title="More Details"></h4>
                        <h4>Others</h4>
                        <p>Explore a wide variety of products.</p>
                        <a href="others.php" class="details-link" title="More Details"></i></a>
                    </div>
                </div>

        </div>
    </section><!-- End Portfolio Section -->


    </div>
    <div class="swiper-pagination"></div>
    </div>

    </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>

            <div class="row mt-5">

                <div class="col-lg-4" data-aos="fade-right">
                    <div class="info">
                        <div class="address">
                            <!--form-->
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>TechBuy@gmail.com</p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                       required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                   required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                      required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->


</main><!-- End #main -->

<?php
include 'footer.php';
?>
