<?php
function recommendation()
{
    require_once 'model/Database.php';
    $db = new Database();
    $conn = $db->getConnection();

    // Get the id of the current product on the page
    $current_id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!isset($_GET['id'])) {
        echo '';
    } else {


// Keywords to search for in the database
        $keywords = ['apple', 'samsung', 'sony', 'hp', 'google', 'xiaomi', 'lenovo', 'asus', 'epson', 'canon', 'console'];

        //searches a for keywords, and returns the first keyword found.
        function findKeyword($str, $keywords)
        {
            foreach ($keywords as $keyword) {
                if (stripos($str, $keyword) !== false) {
                    return $keyword;
                }
            }
            return null;
        }

// Find the keyword in the current product's phone_model column
        $sql = "SELECT phone_model FROM phones WHERE id = $current_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $current_product_keyword = findKeyword($row["phone_model"], $keywords);
        }

// Find all products in the database that match the current product's keyword and are not the current product
        $sql = "SELECT id, phone_model, price, link, link2, link3, image FROM phones WHERE phone_model
        LIKE '%$current_product_keyword%' AND id != $current_id";

        $result = $conn->query($sql);

// Save the matching product IDs in an array
        $product_ids = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($product_ids, $row['id']);
            }
        }

        function displayProductInformation($row)
        {
            echo "<h3 class='text-center'>Similar Products</h3>";
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
            echo "<li><strong>Buy Now From:</strong> <a href='" . $row["link"] . "' target='_blank'>" . parse_url($row["link"], PHP_URL_HOST) . "</a></li>";

            if (!empty($row['link2'])) {
                echo "<li><strong>Buy Now From:</strong> <a href='" . $row["link2"] . "' target='_blank'>" . parse_url($row["link2"], PHP_URL_HOST) . "</a></li>";
            }
            if (!empty($row['link3'])) {
                echo "<li><strong>Buy Now From:</strong> <a href='" . $row["link3"] . "' target='_blank'>" . parse_url($row["link3"], PHP_URL_HOST) . "</a></li>";
            }
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
        }

        // Pick a random product ID from the array and display its information
        if (!empty($product_ids)) {
            $random_id = $product_ids[array_rand($product_ids)];
            $sql = "SELECT id, phone_model, price, link, link2, link3, image FROM phones WHERE id = $random_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                displayProductInformation($row);
                $conn->close();
            }
        }
    }
}
