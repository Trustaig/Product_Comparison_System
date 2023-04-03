<?php
include 'SessionNavbar.php';
include 'assets/css/phone-card.php';
?>
<head>
    <meta charset="UTF-8">
    <title>Favourites</title>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Favourites</h2>
                <p>Add item to your favourites:</p>
                <ol>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="phones.php" class="buy-now">Phones</a>
                            </div>
                            <div class="col-md-4">
                                <a href="laptops.php" class="buy-now">Laptops</a>
                            </div>
                            <div class="col-md-4">
                                <a href="others.php" class="buy-now">Others</a>
                            </div>
                        </div>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
</head>


<body>
<main id="main" class="flex-shrink-0">
    <script>
        function deleteFromFavourites(phoneId) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "remove_from_favourites.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    // Reload the favourites page
                    window.location.href = "favourites.php";
                }
            };
            let params = "phoneId=" + phoneId;
            xhr.send(params);
        }

        // Java script to link compare button to compare page and pass id to the URL
        function comparePhone(phoneId) {
            if (phoneId >= 0 && phoneId <= 18 || phoneId >= 24 && phoneId <= 29) {
                window.location.href = "compare.php?id=" + phoneId;
            } else if (phoneId >= 30 && phoneId <= 47) {
                window.location.href = "compareLaptop.php?id=" + phoneId;
            } else {
                window.location.href = "compareOther.php?id=" + phoneId;
            }
        }
    </script>

    <?php
    require_once("model/Database.php");

    $database = new Database();
    $conn = $database->getConnection();

    // Retrieve the user ID from the session (if any)
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Retrieve the favourites from the database based on the user ID
    $sql = "SELECT phones.id, phones.phone_model, phones.price, phones.image FROM phones JOIN favourites ON phones.id = favourites.phone_id WHERE favourites.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display the favourites
    if ($result->num_rows > 0) {
        echo "<div class='row'>";
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            if ($count == 3) {
                echo "</div><div class='row'>";
                $count = 0;
            }
            echo "<div class='phone-card' id='phone-card-" . $row["id"] . "'>";
            echo "<div class='phone-image' style='background-image: url(" . $row["image"] . ")'></div>";
            echo "<div class='phone-details'>";
            echo "<div class='phone-model'>" . $row["phone_model"] . "</div>";
            echo "<div class='phone-price'>&pound;" . $row["price"] . "</div>";
            echo "<button class='buy-now' onclick='deleteFromFavourites(" . $row["id"] . ")'>Remove</button>";
            echo "<button class='buy-now' style='margin-left:10px;' onclick='comparePhone(" . $row["id"] . ")'>Compare & Buy</button>";

            echo "</div>";
            echo "</div>";
            $count++;
        }
        echo "</div>";
    } else {
        echo "<p>You have no favourites.</p><p>Head over to our categories to begin.</p>";
    }

    $stmt->close();
    $conn->close();
    ?>
</main>


</body>
