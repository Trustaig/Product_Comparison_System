<?php
include 'SessionNavbar.php';
include 'assets/css/phone-card.php';

$db = new Database();
$conn = $db->getConnection();

if (isset($_POST['save_changes'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update username
    if (!empty($username)) {
        $query = "UPDATE login SET username='$username' WHERE id='{$_SESSION['user_id']}'";
        $result = $conn->query($query);
        if (!$result) {
            die("Username update failed: " . $conn->error);
        }
    }

    // Update email
    if (!empty($email)) {
        $query = "UPDATE login SET email='$email' WHERE id='{$_SESSION['user_id']}'";
        $result = $conn->query($query);
        if (!$result) {
            die("Email update failed: " . $conn->error);
        }
    }

    // Update password
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE login SET password='$password' WHERE id='{$_SESSION['user_id']}'";
        $result = $conn->query($query);
        if (!$result) {
            die("Password update failed: " . $conn->error);
        }
    }

    // Show popup message with close button
    echo "<script>alert('Account information has been updated.'); window.location.href='Settings.php';</script>";
}

if (isset($_POST['delete_account'])) {
    // Delete user favorites
    $query = "DELETE FROM favourites WHERE user_id='{$_SESSION['user_id']}'";
    $result = $conn->query($query);
    if (!$result) {
        die("Favorites deletion failed: " . $conn->error);
    }

    // Delete user account
    $query = "DELETE FROM login WHERE id='{$_SESSION['user_id']}'";
    $result = $conn->query($query);
    if (!$result) {
        die("Account deletion failed: " . $conn->error);
    }

    // Clear session and redirect to index.php
    session_unset();
    session_destroy();
    echo "<script>alert('Account has been deleted.'); window.location.href='index.php';</script>";
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Settings</title>
</head>

<body>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container"></div>
</section>
<!-- End Breadcrumbs -->

<div class="logo" data-aos="zoom-out">
    <img src="assets/img/TechBuy_Logo_nbg.jpeg" alt="TechBuy Logo"
         style="width: 380px; display: block; margin: 0 auto;">
</div>

<div class="container mt-5">
    <h1 class="text-center">Settings</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST">

                <div class="form-group">
                    <label for="username">Change username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <br>

                <div class="form-group">
                    <label for="email">Change email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Change password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <br>

                <div class="form-group">
                    <button type="submit" class="buy-now" name="save_changes">Save Changes</button>
                </div>
            </form>
            <br>

<!--            htmlspecialchars to stop injections of malicious code into the web page.-->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <button type="submit" name="delete_account" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                        Delete Account
                    </button>
                </div>
            </form>

            <br>


            <section id="faq" class="faq">
                <div class="container">

                    <div class="section-title" data-aos="zoom-out">
                        <h2>Terms and Conditions</h2>
                    </div>

                    <ul class="faq-list">

                        <li>
                            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Click to read <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
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
        </div>
    </div>
</div>
</body>

</html>

<?php
include 'footer.php';
?>
