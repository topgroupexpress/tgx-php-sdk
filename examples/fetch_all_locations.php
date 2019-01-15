<?php

require_once '../src/tgx/Client.php';
require_once '../src/tgx/resources/Country.php';

$client = new tgx\Client('avaldevilap@gmail.com', '2e613420f80dede25b192bbd193e3d330bec393ea02d879254c196cf8e7769e1');

$spain = new tgx\resources\Country('ES', 'Spain');
$locations = $client->contents()->fetchCountryLocations($spain);

$arrlength = count($locations);

for ($i = 0; $i < $arrlength; $i++) {
    $location = $locations[$i];
    echo $location . PHP_EOL;
}

$client->close();

?>