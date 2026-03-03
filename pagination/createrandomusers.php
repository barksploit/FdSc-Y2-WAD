<?php 

if ($_POST) {

$host = "plesk.remote.ac";
$username = "thomas_griffin_wad";
$password = "s8qY1y8?2";
$database = "thomas_griffin_wad";

$conn = mysqli_connect($host, $username, $password, $database);

$users = $_POST["amount"];

for ($i = 0; $i < $users; $i++) {
    $email = uniqid() . "test@test.com";
    $password = password_hash(uniqid(), PASSWORD_DEFAULT);
    $admin = rand(0, 1);
    $enabled = 1;


    if ($conn->query("INSERT INTO `users` (email, password, admin, enabled) VALUES ('$email', '$password', '$admin', '$enabled')")) {
        echo "RAN";
    } else {
        echo "FAILED";
    }

}

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Create random users</h1>
    <form action="" method="POST">
        <input type="range" name="amount" min="1" max="100">
        <button type="submit">Go Bake</button>
    </form>
    
</body>
</html>