<?php
include 'SessionNavbar.php';
include 'assets/css/phone-card.php';
?>

<head>
    <title>Phones</title>
</head>

<body class="d-flex flex-column h-100">
<main class="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Phones</h2>
                <!-- Sort Dropdown -->
                <div>
                    <form method="get" action="">
                        <select name="sort" onchange="this.form.submit()">
                            <option value="">Sort by Price</option>
                            <option value="asc">Low to High</option>
                            <option value="desc">High to Low</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->


    <div class="phone-container">
        <?php
        require_once 'model/Database.php';

        // Create an instance of the Database class
        $db = new Database();
        $conn = $db->getConnection();

        // Query the database for phone information
        $sql = "SELECT id, phone_model, price, link, image, details FROM phones WHERE category = 'phone'";

        // checks if sort option is selected and orders accordingly
        if(isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if($sort == 'asc') {
                $sql .= " ORDER BY price ASC";
            } elseif($sort == 'desc') {
                $sql .= " ORDER BY price DESC";
            }
        }

        // Query the database for phone information
        $result = $db->getQuery($sql);

        // Loop through the results and display them in containers
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class='phone-card' id='phone-card-<?php echo $row["id"]; ?>'>
                    <div class='phone-image' style='background-image: url(<?php echo $row["image"]; ?>)'></div>
                    <div class='phone-details'>
                        <div class='phone-model'><?php echo $row["phone_model"]; ?></div>
                        <div class='phone-price'>&pound;<?php echo $row["price"]; ?></div>
                        <button class='buy-now'><a href='<?php echo $row["link"]; ?>'>Buy Now</a></button>

                        <?php
                        //Compare button only works if user is logged in
                        if (isset($_SESSION['user_id'])) {?>
                            <button class='buy-now' style='margin-left:40px;' onclick='comparePhone(<?php echo $row["id"]; ?>)'>Compare</button>
                            <?php } else {?>
                            <button class='buy-now' style='margin-left:40px;' onclick='redirectToRegister()'>Compare</button>
                            <?php }
                        //favorites button has an id based on the product displayed inside it from the database.
                        if (isset($_SESSION['user_id'])) { ?>
                            <button class='buy-now' style='margin-left:40px;' onclick='addToFavourites(<?php echo $row["id"]; ?>)'
                                    id='add-to-favourites-<?php echo $row["id"]; ?>'>Favourite</button>
                            <?php } else { ?>
                            <button class='buy-now' style='margin-left:40px;' onclick='redirectToRegister()'>Favourite</button>
                            <?php } ?>
                    </div>
                </div>
                <?php
            }
        }
        $conn->close();
        ?>
    </div>
</main>

<!-- ======= Start of Scripts ======= -->
<section>
    <script>
        // Java script to link compare button to compare page and pass id to the URL
        function comparePhone(phoneId) {
            window.location.href = "compare.php?id=" + phoneId;
        }
        function redirectToRegister() {
            window.location.href = 'register.php';
        }

        /* The phone details are retrieved from the phone-card using DOM manipulation.
         The details are stored to the favourites table in the database, with the phone ID as the key.
         The user is redirected to the favourites.php page.
         */
        function addToFavourites(phoneId) {
            // Retrieve the phone details from the phone-card
            let phoneCard = document.getElementById("phone-card-" + phoneId);
            let phoneModel = phoneCard.querySelector(".phone-model").innerText;
            let phonePrice = phoneCard.querySelector(".phone-price").innerText;
            let phoneImage = phoneCard.querySelector(".phone-image").style.backgroundImage;

            // Store the phone details in the database
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "add_to_favourites.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    // Show an alert that the item has been added to favourites
                    alert("Added");
                }
            };
            let params = "phoneId=" + phoneId + "&phoneModel=" + phoneModel + "&phonePrice=" + phonePrice + "&phoneImage=" + phoneImage;
            xhr.send(params);
        }
    </script>
</section>
<!-- ======= End of Scripts ======= -->
</body>

<?php
include 'footer.php';
?>
