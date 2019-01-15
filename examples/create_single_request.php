<?php

require_once '../src/tgx/Client.php';
require_once '../src/tgx/resources/Agency.php';
require_once '../src/tgx/resources/Country.php';
require_once '../src/tgx/resources/Location.php';
require_once '../src/tgx/resources/Board.php';
require_once '../src/tgx/resources/Rating.php';
require_once '../src/tgx/resources/Room.php';
require_once '../src/tgx/resources/SingleRequest.php';

$client = new tgx\Client('myaccount@mymail.com', '5bdbab0f8fd271b31b5dd2b6bd1962700ce384bb39b719960fb5bf0e24c7dd50');

$agency = new tgx\resources\Agency('Agency 1', 'Jane Doe', 'jane@gmail.com', 'Notas de prueba', 6262);
$country = new tgx\resources\Country('ES', 'Spain');
$location = new tgx\resources\Location(30738, 'Barcelona', $country);
$board = new tgx\resources\Board('BB', 'Bed and Breakfast');
$rating = new tgx\resources\Rating('4', '4 Stars');

$single_room = new tgx\resources\Room(1, 'Single Room');
$twin_room = new tgx\resources\Room(3, 'Twin Room');


$request = new tgx\resources\SingleRequest($agency, $country, $location, '10/09/2019', '12/09/2019', $board, $rating, 70.0, 'Corporate Group', 'MyRef00001');
$request->addRooms($single_room, 10);
$request->addRooms($twin_room, 15);

$client->requests()->single($request);

echo $request;

$client->close();

?>