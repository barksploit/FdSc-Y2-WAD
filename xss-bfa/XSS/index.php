<?php

    //Defines a constant with the given name of the notices file.
    define('FileName', 'data.txt');

    //Gets the notices from the specified file.
    $notices = file(FileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    //Uncomment the following to view the array of notices.
    // var_dump($notices);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <h1><a href="../">◀</a> Notice Board</h1>
    <ul>
        <?php

            //Outputs all of the notices in the notices array.
            foreach ($notices as &$notice)
            {
                // echo '<li>' . $notice . '</li>';
                echo '<li>' . htmlspecialchars($notice) . '</li>';
            }

        ?>
    </ul>

    <!-- Form for creating new notices. -->
    <form action="new.php" method="POST">
        <input type="text" name="txtInput" placeholder="New Notice"/>
        <button type="submit">Create</button>
    </form>
</body>

</html>

<!-- <script>window.location.href = "https://example.com/";</script> -->