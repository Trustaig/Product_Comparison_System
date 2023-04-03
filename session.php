<?php
include 'model/Database.php';

// start session
session_start();

function getLoggedInUserFromSession($loggedInUser)
{
    if (isset($_SESSION['logged_in_user'])) {
        $loggedInUser = $_SESSION['logged_in_user'];
    }
    return $loggedInUser;
}
