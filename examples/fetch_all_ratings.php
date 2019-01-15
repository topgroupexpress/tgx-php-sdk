<?php

require_once '../src/tgx/Client.php';

$client = new tgx\Client('avaldevilap@gmail.com', '2e613420f80dede25b192bbd193e3d330bec393ea02d879254c196cf8e7769e1');

$ratings = $client->contents()->fetchAllRatings();

$arrlength = count($ratings);

for ($i = 0; $i < $arrlength; $i++) {
    $rating = $ratings[$i];
    echo $rating . PHP_EOL;
}

$client->close();

?>