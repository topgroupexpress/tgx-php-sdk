<?php

require_once '../src/tgx/Client.php';
require_once '../src/tgx/resources/Agency.php';

$client = new tgx\Client('myaccount@mymail.com', '5bdbab0f8fd271b31b5dd2b6bd1962700ce384bb39b719960fb5bf0e24c7dd50');
$agency = new tgx\resources\Agency('Agency 1', 'Jane Doe', 'jane@gmail.com', 'Notas de prueba');

$client->agencies()->add($agency);

echo $agency;

$client->close();

?>