<?php

require_once '../src/tgx/Client.php';

$client = new tgx\Client('myaccount@mymail.com', '5bdbab0f8fd271b31b5dd2b6bd1962700ce384bb39b719960fb5bf0e24c7dd50');

$countries = $client->contents()->fetchAllCountries();

$arrlength = count($countries);

for ($i = 0; $i < $arrlength; $i++) {
    $country = $countries[$i];
    echo $country . PHP_EOL;
}

$client->close();

?>