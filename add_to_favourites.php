<?php

session_start();
require_once("model/Database.php");

$database = new Database();
$conn = $database->getConnection();

// Retrieve the phone ID from the POST request
$phoneId = $_POST["phoneId"];

// Retrieve the user ID from the session
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Insert the favourite into the database
$stmt = $conn->prepare("INSERT INTO favourites (phone_id, user_id) VALUES (?, ?)");
$stmt->bind_param("ii", $phoneId, $userId);
$stmt->execute();

$stmt->close();
$conn->close();


require_once("model/Database.php");

$database = new Database();
$conn = $database->getConnection();

$phoneId = $_POST["phoneId"];

$stmt = $conn->prepare("SELECT COUNT(*) AS count FROM favourites WHERE phone_id = ?");
$stmt->bind_param("i", $phoneId);
$stmt->execute();
$result = $stmt->get_result();

$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["count"] > 0) {
        $response["exists"] = true;
    } else {
        $response["exists"] = false;
    }
}

$stmt->close();
$conn->close();

echo json_encode($response);
