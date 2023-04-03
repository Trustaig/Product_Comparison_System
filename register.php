<?php
include 'SessionNavbar.php';
include 'assets/css/phone-card.php';

// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // check if username or email provided
    if (empty($username) && empty($email)) {
        echo "Please enter a username or email.";
        echo "Please enter a username or email.";
    } else {
        // check if password and confirm password match
        if ($password != $confirm_password) {
            echo "Passwords do not match.";
        } else {
            // hash password and insert into database
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$password')";

            if (mysqli_query($conn, $sql)) {
                header("Location: login_page.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
?>
<title>Register</title>

<main id="main">
    <!-- ======= Register header Section ======= -->
    <section id="register_header" class="register_header">
        <div class="container">

            <div class="section-title"
            ="zoom-out">
            <div class="section-title" data-aos="zoom-out">
                <h2></h2>
                <p>Register Now</p>
            </div>
            <div class="section-title" data-aos="zoom-out">
                <h2>Login or Register</h2>
                <p1>Only your username or email is required. Password fields are required.</p1>
                <br>
                <p1>Register to gain full access to all our features</p1>
            </div>
            <div class="logo" data-aos="zoom-out">
                <img src="assets/img/TechBuy_Logo_nbg.jpeg" alt="TechBuy Logo"
                     style="width: 200px; display: block; margin: 0 auto;">
            </div>
    </section>
    <!-- =======End of Register header Section ======= -->


    <section id="login" class="login">
        <div class="container">

            <form action="register.php" method="POST" role="form">
                <div class="row">

                    <div class="col-md-6 form-group mb-3">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Password">
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                               placeholder="Confirm Password">
                    </div>

                    <div class="col-md-12 text-center mb-3">
                        <button type="submit" name="register" class="btn-get-started">Create Account</button>
                    </div>

                    <div class="col-md-12 text-center">
                        <a href="login_page.php" class="btn-get-started">Login</a>
                    </div>

                </div>
            </form>

        </div>

        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Terms and Conditions</h2>
                </div>

                <ul class="faq-list">

                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">By registering you
                            accepts to the terms and conditions <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>Welcome to TechBuy! By accessing or using our services, you agree to be bound by the
                                following terms and conditions:</p>
                            <p>1. Use of Service</p>
                            <p>Our services are intended for personal, non-commercial use only. You agree to use
                                our services only for lawful purposes and in a manner that does not infringe the
                                rights of, or restrict or inhibit the use and enjoyment of, our services by any
                                third party.</p>
                            <p>2. Content</p>
                            <p>All content on our website, including product descriptions, images, and reviews,
                                is for informational purposes only. We do not guarantee the accuracy, completeness,
                                or reliability of any content posted on our website. You agree to use all content
                                at your own risk.</p>
                            <p>3. Links to Third-Party Websites</p>
                            <p>Our website may contain links to third-party websites or resources. You acknowledge
                                and agree that we are not responsible or liable for the availability or accuracy of
                                such websites or resources, or for the content, products, or services available from
                                such websites or resources.</p>
                            <p>4. Changes to Terms and Conditions</p>
                            <p>We reserve the right to modify or update these terms and conditions at any time
                                without prior notice. Your continued use of our services after any such changes
                                constitutes your acceptance of the new terms and conditions.
                                If you have any questions or concerns about these terms and conditions, please
                                contact us through the contact page.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </section>


</main><!-- End #main -->

<?php
include 'footer.php';
?>
