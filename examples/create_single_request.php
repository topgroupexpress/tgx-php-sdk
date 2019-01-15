<?php

require_once '../src/tgx/Client.php';
require_once '../src/tgx/resources/Agency.php';
require_once '../src/tgx/resources/Country.php';
require_once '../src/tgx/resources/Location.php';
require_once '../src/tgx/resources/Board.php';
require_once '../src/tgx/resources/Rating.php';
require_once '../src/tgx/resources/Room.php';
require_once '../src/tgx/resources/SingleRequest.php';

$client = new tgx\Client('avaldevilap@gmail.com', '2e613420f80dede25b192bbd193e3d330bec393ea02d879254c196cf8e7769e1');

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