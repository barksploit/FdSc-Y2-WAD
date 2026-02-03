<?php 



set_time_limit(0);

session_start();

while (true) {

    $currentfruit = file_get_contents("fruit.txt");

    if (isset($_SESSION["last_fruit"])) {

        if ($currentfruit != $_SESSION["last_fruit"]) {
            $_SESSION["last_fruit"] = $currentfruit;
            echo $currentfruit;
            break;
        }
    } else {
        $_SESSION["last_fruit"] = $currentfruit;
        echo $currentfruit;
        break;
    }

    usleep(500000);

}


?>