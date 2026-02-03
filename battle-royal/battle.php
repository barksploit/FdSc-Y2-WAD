<?php

$request = file_get_contents("php://input");

$data = json_decode($request, true);

$name1 = $data["name1"];

$name2 = $data["name2"];

$name1Percent = random_int(0,100);

$name2Percent = 100 - $name1Percent;

$response = array(
    "name1" => array(
    "name" => $name1,
    "percent" => $name1Percent
     ),
    "name2" => array(
    "name" => $name2,
    "percent" => $name2Percent
     ),
);

$encodedResponse = json_encode($response);

exit($encodedResponse);




?>