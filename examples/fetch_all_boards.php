<?php

require_once '../src/tgx/Client.php';

$client = new tgx\Client('myaccount@mymail.com', '5bdbab0f8fd271b31b5dd2b6bd1962700ce384bb39b719960fb5bf0e24c7dd50');

$boards = $client->contents()->fetchAllBoards();

$arrlength = count($boards);

for ($i = 0; $i < $arrlength; $i++) {
    $board = $boards[$i];
    echo $board . PHP_EOL;
}

$client->close();

?>