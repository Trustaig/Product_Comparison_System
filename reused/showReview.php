<?php
//leave reviews
if (isset($_POST['product-select'], $_POST['rating'], $_POST['comment'])) {
    $product_id = $_POST['product-select'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Prepare and execute the statement to insert the review
    $stmt = $conn->prepare("INSERT INTO reviews (product_id, rating, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $product_id, $rating, $comment);
    $stmt->execute();
}
?>


<!--show reviews-->
<div class="col-lg-12">
    <div class="portfolio-info">
        <h3>Reviews</h3>
        <?php
        // Get the id of the current product on the page
        if (!isset($_GET['id'])) {
            echo 'No reviews available';
        } else {
            $product_id = $_GET['id'];
            // Query the database for the reviews of the selected product
            $sql = "SELECT rating, comment FROM reviews WHERE product_id = '$product_id'";
        $result = $conn->query($sql);

        // Check if there are any reviews
        if ($result->num_rows > 0) {
            // Loop through each review and display
            while ($row = $result->fetch_assoc()) {
                $rating = $row['rating'];
                $comment = $row['comment'];

                // Display the review details
                echo "<p>Rating: $rating stars</p>";
                echo "<p>Comment: $comment</p>";
                echo "<hr>";
            }
        } else {
            echo "<p>No reviews found for this product</p>";
        }
        }
        ?>
    </div>
</div>
