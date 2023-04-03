<?php
ob_start(); // Start output buffering

include 'SessionNavbar.php';
// Check if password/username is incorrect
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();

    $username_or_email = mysqli_real_escape_string($db->getConnection(), $_POST['username_or_email']);
    $password = mysqli_real_escape_string($db->getConnection(), $_POST['password']);

    $query = "SELECT id, username, email, password FROM login WHERE username = '$username_or_email' OR email = '$username_or_email'";
    $result = $db->getQuery($query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variable and redirect
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['logged_in_user'] = $row['username'];
            header("Location: landing_page.php");
            exit;
        } else {
            // Password is incorrect
            $error_message = "Incorrect password.";
        }
    } else {
        // No user found with the given username/email
        $error_message = "Incorrect username or email.";
    }

}

$loggedInUser = '';
$loggedInUser = getLoggedInUserFromSession($loggedInUser);

ob_end_flush(); // Send the output to the browser
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Login</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/phone-card.css" rel="stylesheet">
</head>

<body>
<main id="main">
    <!-- ======= Login header Section ======= -->
    <section id="register_header" class="register_header">
        <div class="container">

            <div class="section-title"
            ="zoom-out">
            <div class="section-title" data-aos="zoom-out">
                <h2>Login</h2>
                <p>Login and Shop Now!</p>
            </div>
            <div class="logo" data-aos="zoom-out">
                <img src="assets/img/TechBuy_Logo_nbg.jpeg" alt="TechBuy Logo"
                     style="width: 200px; display: block; margin: 0 auto;">
            </div>
    </section>
    <!-- ======= Login end Section ======= -->

    <!-- ======= Login Section ======= -->
    <section id="login" class="login">
        <div class="container">
            <form action="" method="POST" role="form">
                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <input type="text" name="username_or_email" class="form-control" id="username_or_email"
                               placeholder="Username or Email" required>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Password" required>
                    </div>

                    <div class="col-md-12 text-center mb-3">
                        <button type="submit" name="login" class="btn-get-started">Login</button>
                    </div>

                    <div class="col-md-12 text-center">
                        <a href="register.php" class="btn-get-started">Register Now!</a>
                    </div>
                </div>
            </form>
            <?php if (!empty($error_message)) { ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
        </div>
    </section>
</main>
</body>
<?php include 'footer.php'; ?>


