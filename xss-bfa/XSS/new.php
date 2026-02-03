<?php

if (isset($_POST['txtInput']))
{
    //Gets the current date and concatenate it to the user input.
    $value = date('H:i:s') . ' - ' . $_POST['txtInput'];

    // Appends a new line followed by the notice to the notice file.
    file_put_contents('data.txt', PHP_EOL . $value, FILE_APPEND);
}

// Sends the user back to the main page.
header("Location: ./");