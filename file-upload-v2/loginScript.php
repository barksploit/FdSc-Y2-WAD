<?php 


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(400);
    exit();
}

$conn = mysqli_connect("plesk.remote.ac", "thomas_griffin_wad", "i101!apO2", "thomas_griffin_wad");

if (!$conn) {
    http_response_code(503);
    exit();
} 

$email = $_POST["email"];
$password = $_POST["password"];

$stmt = mysqli_prepare($conn, "SELECT * FROM `users` WHERE `email` = ?");

mysqli_stmt_bind_param($stmt, "s", $email);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    http_response_code(401);
    exit("no user found");
}

$user = mysqli_fetch_assoc($result);

if (!password_verify($password, $user["password"])) {
    http_response_code(401);
    exit("password incorrect");
}

session_start();

$_SESSION["id"] = $user["id"];







