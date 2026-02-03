<?php 
set_time_limit(60);
header("Content-Type: text/event-stream");
header('Cache-Control: no-cache');

session_start();

while (true) {

    $currentfruit = file_get_contents("fruit.txt");

    if (isset($_SESSION["last_fruit"])) {

        if ($currentfruit != $_SESSION["last_fruit"]) {
            $_SESSION["last_fruit"] = $currentfruit;
            echo "data: $currentfruit \n\n";

            flush();
            break;
        }
    } else {
        $_SESSION["last_fruit"] = $currentfruit;
        echo "data: $currentfruit \n\n";

        flush();
        break;
    }

    sleep(1);

}



?>