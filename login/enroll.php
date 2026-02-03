<?php 

session_start();

if (isset($_SESSION["id"]) == false) {
    // If user is not logged in

    header("Location: index.html");
    die();

}

$json = file_get_contents("php://input");

$data = json_decode($json, true);

$userid = $_SESSION["id"];

$courseid = $data["course"];

require 'connect.php';

$sql = "INSERT INTO `enrollments` (user, course) VALUES ($userid, $courseid)";

$result = mysqli_query($conn, $sql);
