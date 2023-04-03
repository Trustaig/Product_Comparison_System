<?php
include 'SessionNavbar.php';
include 'assets/css/phone-card.php';

require_once 'model/Database.php';

$db = new Database();
$conn = $db->getConnection();
?>

<head>
    <title>Compare</title>
    <link href="assets/css/compare.css" rel="stylesheet">
    <style>
        #product-details, #compare-section {margin: 0;padding: 0;}

        .phone-image {
            width: 45%;
            height: auto;
            object-fit: contain;
            overflow: auto;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Compare Products</h2>
            <ol>
                <div class="container">
                    <div class="row">
                        <div class="col-md-auto">
                            <?php if (isset($_SESSION['user_id'])) { ?>
                                <a href="others.php" class="btn-get-started">Continue Shopping</a>
                            <?php } else {
                                echo '<a class="btn-get-started" href="others.php">Continue Shopping</a>';
                            } ?>
                        </div>
                    </div>
            </ol>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->

<main id="main">
    <!-- ======= Product Select Section ======= -->
    <section id="product-select" class="product-select">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Select a Product to Compare</h3>
                    <form method="POST" action="#">
                        <div class="form-group">
                            <label for="product-select">Product:</label>
                            <select class="form-control" id="product-select" name="product-select">
                                <?php
                                // Query the database for phone information
                                $sql = "SELECT id, phone_model FROM phones WHERE category ='other'";
                                $result = $conn->query($sql);

                                // Loop through the results and display them as options in the dropdown
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["id"] . "'>" . $row["phone_model"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn-get-started">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Select Section -->


    <!-- ======= Product 1 Details Section ======= -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section id="product-details">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        // Query the database for 'other' information with the given id, and its reviews
                        $sql = "SELECT phones.id, phones.phone_model, phones.price, phones.link, phones.link2, phones.link3, phones.image,
                        phones.details, AVG(reviews.rating) AS avg_rating, COUNT(reviews.id) AS num_reviews FROM phones LEFT JOIN reviews
                        ON phones.id = reviews.product_id WHERE phones.id='$id' GROUP BY phones.id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                extracted($row);
                            }
                        } else {
                            echo "Please go back and try again";
                        }
                    } else {
                        echo "";
                    }
                    ?>

                    <!-- ======= Review Section ======= -->
                    <br><br>
                    <h3 class='text-center'>Leave a Review</h3>;
                    <form method="POST" action="#">
                        <div class="form-group">
                            <label for="product-select">Product:</label>
                            <select class="form-control" id="product-select" name="product-select">
                                <?php
                                // Query the database for phone information
                                $sql = "SELECT id, phone_model FROM phones WHERE category = 'other'";
                                $result = $conn->query($sql);

                                // Loop through the results and display them as options in the dropdown
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["id"] . "'>" . $row["phone_model"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <select class="form-control" id="rating" name="rating">
                                <option value="1">1 star</option>
                                <option value="2">2 stars</option>
                                <option value="3">3 stars</option>
                                <option value="4">4 stars</option>
                                <option value="5">5 stars</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" id="comment" name="comment"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn-get-started">Submit Review</button>
                    </form>
                    <!-- End Review Section -->
                </section>
                <?php
                include 'reused/showReview.php';
                ?>
            </div>
            <!-- ======= End of Product 1 Details Section ======= -->


            <!-- start of Product compare Details Section -->
            <div class="col-md-6">
                <section id="compare-section">
                    <?php
                    if (isset($_POST['product-select'])) {
                        // Get the id of the selected product
                        $id = $_POST['product-select'];
                    }

                    if (!isset($id)) {
                        $id = rand(50, 60);
                        echo '<p class="text-center">Please select a device to view</p>';
                    }

                    // Query the database for phone information with the given id
                    $sql = "SELECT phone_model, price, link, link2, link3, image, details FROM phones WHERE id='$id'";

                    $result = $conn->query($sql);

                    // Display the phone information
                    /**
                     * @param array $row
                     * @return void
                     */
                    //Product Details Section HTML
                    function extracted(array $row)
                    {
                        //Product Details Section HTML
                        echo "<section id='portfolio-details' class='portfolio-details'>";
                        echo "<div class='container'>";
                        echo "<div class='row gy-4'>";
                        echo "<div class='col-lg-8'>";
                        echo "<div class='portfolio-details-slider'>";
                        echo "<div class='align-items-center'>";
                        echo "<div class='product-img'>";
                        echo "<div class='portfolio-details-slider swiper'>";
                        echo "<div class='phone-image'><a href='" . $row["image"] . "' data-gallery='portfolioGallery'
                        class='portfolio-lightbox preview-link' title='" . $row["phone_model"] . "'><img src='" .
                            $row["image"] . "' alt='" . $row["phone_model"] . "'></a></div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-lg-4'>";
                        echo "<div class='portfolio-info'>";
                        echo "<h3 class='text-center'>Product information</h3>";
                        echo "<ul>";
                        echo "<li><strong>Device id</strong>: " . $row["phone_model"] . "</li>";
                        echo "<li><strong>Price</strong>: £" . $row["price"] . "</li>";

                        $details = $row["details"];
                        // this replaces commas in data with spaces
                        $details = str_replace(",,", "<br><br>", $details);
                        $details = str_replace(",", "<br>", $details);
                        // Display the new format of details
                        echo "<li><strong>Device Specifications</strong>: " . $details . "</li>";

                        echo "<li><strong>Buy Now From:</strong> <a href='" . $row["link"] . "' target='_blank'>" .
                            parse_url($row["link"], PHP_URL_HOST) . "</a></li>";
                        if (empty($row['link2'])) {
                            echo "";
                        } else {
                            echo "<li><strong>Buy Now From:</strong> <a href='" . $row["link2"] . "' target='_blank'>" .
                                parse_url($row["link2"], PHP_URL_HOST) . "</a></li>";
                        }
                        if (empty($row['link3'])) {
                            echo "";
                        } else {
                            echo "<li><strong>Buy Now From:</strong> <a href='" . $row["link3"] . "' target='_blank'>" .
                                parse_url($row["link3"], PHP_URL_HOST) . "</a></li>";
                        }
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            extracted($row);
                            echo "</section>
                    <!-- End Product Details Section -->";
                        }
                    } else {
                        // If no phone found with given id, display error message
                        echo "No phone found with the given id.";
                    }
                    ?>
                </section>
                <!-- Recommendation System -->
                <?php
                require_once 'recommendation.php';
                $recommendation = recommendation();
                ?>
            </div>
        </div>
    </div>
</main>
</body>

<?php
include 'footer.php';
?>

