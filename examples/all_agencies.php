<?php

require_once '../src/tgx/Client.php';

$client = new tgx\Client('avaldevilap@gmail.com', '2e613420f80dede25b192bbd193e3d330bec393ea02d879254c196cf8e7769e1');

$agencies = $client->agencies()->all();

$arrlength = count($agencies);

for ($i = 0; $i < $arrlength; $i++) {
    $agency = $agencies[$i];
    echo $agency . PHP_EOL;
}

$client->close();

?>