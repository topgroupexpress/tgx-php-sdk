<?php

require_once '../src/tgx/Client.php';
require_once '../src/tgx/resources/Country.php';

$client = new tgx\Client('myaccount@mymail.com', '5bdbab0f8fd271b31b5dd2b6bd1962700ce384bb39b719960fb5bf0e24c7dd50');

$spain = new tgx\resources\Country('ES', 'Spain');
$locations = $client->contents()->fetchCountryLocations($spain);

$arrlength = count($locations);

for ($i = 0; $i < $arrlength; $i++) {
    $location = $locations[$i];
    echo $location . PHP_EOL;
}

$client->close();

?>