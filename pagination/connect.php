<?php

$hostname = "plesk.remote.ac";
$username = "thomas_griffin_wad";
$password = "s8qY1y8?2";
$database = "thomas_griffin_wad";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}