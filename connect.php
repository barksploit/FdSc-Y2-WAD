<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

$hostname = "plesk.remote.ac";
$username = "thomas_griffin_wad";
$password = $_ENV['DB_PASSWD'];;
$database = "thomas_griffin_wad";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}