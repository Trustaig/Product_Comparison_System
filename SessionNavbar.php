<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/TechBuy_Logo_nbg.jpeg" rel="icon">
    <link href="assets/img/TechBuy_Logo_nbg.jpeg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent" style="background-color: #121212;">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <a href="landing_page.php"><img src="assets/img/TechBuy_Logo_nbg.jpeg" alt="TechBuy Logo"></a>
            <?php } else {
                echo '<a href="index.php"><img src="assets/img/TechBuy_Logo_nbg.jpeg" alt="TechBuy Logo"></a>';} ?>
        </div>

        <div class="logo">
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <a class="nav-link active" href="landing_page.php">Home</a>
                    <?php } else {echo '<a class="nav-link active" href="index.php">Home</a>';} ?>
                </li>

                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="dropdown"><a
                            href="landing_page.php #dashboard"><?php echo $_SESSION['logged_in_user'] . "'s Dashboard"; ?>
                            <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="Settings.php">Settings</a></li>
                            <li><a href="favourites.php">Favourites</a></li>
                            <li><a href="user_guide.php">Guide</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if (isset($_SESSION['user_id'])) { ?>
                <li class="dropdown"><a href="landing_page.php #Categories"><span>Categories</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="phones.php">Phones</a></li>
                        <li><a href="laptops.php">Laptops</a></li>
                        <li><a href="others.php">Others</a></li>
                    </ul>
                    <?php } else {
                        echo '<li class="dropdown"><a href="landing_page.php#Categories"><span>Categories</span>
                        <i class="bi bi-chevron-down"></i></a><ul><li><a href="phones.php">Phones</a></li><li><a
                        href="laptops.php">Laptops</a></li><li><a href="others.php">Others</a></li></ul></li>';} ?>
                </li>

                <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a class="nav-link" href="landing_page.php #about">About</a>
                    <?php } else {
                        echo '<a class="nav-link" href="index.php #about">About</a>';} ?>
                </li>

                <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a class="nav-link" href="landing_page.php #services">Services</a>
                    <?php } else {
                        echo '<a class="nav-link" href="index.php #services">services</a>';} ?>
                </li>

                <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a class="nav-link" href="landing_page.php #contact">Contact</a>
                    <?php } else {
                        echo '<a class="nav-link" href="index.php #contact">Contact</a>';} ?>
                </li>

                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="dropdown"><a
                            href="landing_page.php #dashboard"><?php echo "Reviews"; ?>
                            <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="compare.php">Review Phones</a></li>
                            <li><a href="compareLaptop.php">Review Laptops</a></li>
                            <li><a href="compareOther.php">Review Others</a></li>
                        </ul>
                    </li><?php } ?>

                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <li class="dropdown"><a href="register.php"><span>Register</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="register.php">Register now</a></li>
                            <li><a href="login_page.php">Login</a></li>
                        </ul>
                    </li>
                <?php } else { ?><a href="logout.php">Logout</a><?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>
<!-- End Header -->

</body>
</html>
