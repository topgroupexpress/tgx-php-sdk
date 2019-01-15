<?php

require_once '../src/tgx/Client.php';

$client = new tgx\Client('myaccount@mymail.com', '5bdbab0f8fd271b31b5dd2b6bd1962700ce384bb39b719960fb5bf0e24c7dd50');

$rooms = $client->contents()->fetchAllRooms();

$arrlength = count($rooms);

for ($i = 0; $i < $arrlength; $i++) {
    $room = $rooms[$i];
    echo $room . PHP_EOL;
}

$client->close();

?>