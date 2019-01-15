<?php

require_once '../src/tgx/Client.php';

$client = new tgx\Client('avaldevilap@gmail.com', '2e613420f80dede25b192bbd193e3d330bec393ea02d879254c196cf8e7769e1');

$boards = $client->contents()->fetchAllBoards();

$arrlength = count($boards);

for ($i = 0; $i < $arrlength; $i++) {
    $board = $boards[$i];
    echo $board . PHP_EOL;
}

$client->close();

?>