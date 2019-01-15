<?php

require_once '../src/tgx/Client.php';
require_once '../src/tgx/resources/Agency.php';

$client = new tgx\Client('avaldevilap@gmail.com', '2e613420f80dede25b192bbd193e3d330bec393ea02d879254c196cf8e7769e1');
$agency = new tgx\resources\Agency('Agency 1', 'Jane Doe', 'jane@gmail.com', 'Notas de prueba');

$client->agencies()->add($agency);

echo $agency;

$client->close();

?>