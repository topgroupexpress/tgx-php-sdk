<?php

require_once '../src/tgx/Client.php';

$client = new tgx\Client('myaccount@mymail.com', '5bdbab0f8fd271b31b5dd2b6bd1962700ce384bb39b719960fb5bf0e24c7dd50');

$agencies = $client->agencies()->all();

$arrlength = count($agencies);

for ($i = 0; $i < $arrlength; $i++) {
    $agency = $agencies[$i];
    echo $agency . PHP_EOL;
}

$client->close();

?>