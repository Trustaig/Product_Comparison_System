<?php
    // Check if phone ID was sent
    if (isset($_POST['phoneId'])) {
        $phoneId = $_POST['phoneId'];

        // Connect to the database
        require_once "model/Database.php";
        $db = new Database();
        $conn = $db->getConnection();

        // Prepare the delete query
        $query = "DELETE FROM favourites WHERE phone_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $phoneId);

        // Execute the delete query
        $stmt->execute();

        // Close the statement and the connection
        $stmt->close();
        $conn->close();
    }
