<?php
include 'connect.php';
// Connect to the plesk database

session_start();

if (!isset($_SESSION["attempts"])) {

    $_SESSION["attempts"] = 0;
    $_SESSION["last_attempt"] = time();

}

if (time() > $_SESSION["last_attempt"] + 1800) {

    // if it has been more than half an hour since the last login attempt
    $_SESSION["attempts"] = 1;
    $_SESSION["last_attempt"] = time();

} else {

    $_SESSION["attempts"]++;

}

if ($_SESSION["attempts"] >= 3) {
    $response = array(
        "status"=> "error",
        "message"=> "User locked due to too many attempts"
    );
    exit(json_encode($response));
}

$json = file_get_contents("php://input");

$data = json_decode($json, true);

$email = $data['email'];
$password = $data['password'];

$query = "SELECT * FROM users WHERE `email` = '$email'";
// Build database query to find user

$result = mysqli_query($conn, $query);
// Run query

if (mysqli_num_rows($result) > 0) {
    // if user was found with this email address

    $user = mysqli_fetch_assoc($result);
    // Fetch user data

 
    if (password_verify($password, $user["password"])) {
        // password was correct

        $_SESSION["id"] = $user["id"];

        $response = array(
            "status"=> "success",
            "message"=> "Email and/or Password was correct"
        );
        exit(json_encode($response));
    } else {
        // password incorrect

        $response = array(
            "status"=> "error",
            "message"=> "Email and/or Password was incorrect"
        );
        exit(json_encode($response));
    }
} else {
    // If no user was found
    $response = array(
        "status"=> "error",
        "message"=> "Email and/or Password was incorrect"
    );
    exit(json_encode($response));
}