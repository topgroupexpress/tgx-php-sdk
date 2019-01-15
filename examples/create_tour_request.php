<?php

require_once '../src/tgx/Client.php';
require_once '../src/tgx/resources/Agency.php';
require_once '../src/tgx/resources/Country.php';
require_once '../src/tgx/resources/Location.php';
require_once '../src/tgx/resources/Board.php';
require_once '../src/tgx/resources/Rating.php';
require_once '../src/tgx/resources/Room.php';
require_once '../src/tgx/resources/TourRequest.php';
require_once '../src/tgx/resources/Destination.php';

$client = new tgx\Client('myaccount@mymail.com', '5bdbab0f8fd271b31b5dd2b6bd1962700ce384bb39b719960fb5bf0e24c7dd50');

$agency = new tgx\resources\Agency('Agency 1', 'Jane Doe', 'jane@gmail.com', 'Notas de prueba', 6262);

$country = new tgx\resources\Country('ES', 'Spain');
$malaga = new tgx\resources\Location(32555, 'Málaga', $country);
$torremolinos = new tgx\resources\Location(34140, 'Marbella', $country);
$marbella = new tgx\resources\Location(32592, 'Marbella', $country);

$board = new tgx\resources\Board('BB', 'Bed and Breakfast');
$rating = new tgx\resources\Rating('4', '4 Stars');

$single_room = new tgx\resources\Room(1, 'Single Room');
$twin_room = new tgx\resources\Room(3, 'Twin Room');


$request = new tgx\resources\TourRequest($agency, $board, $rating, 75.0, 'Hen & Stack Group', 'MyRef00002');
$request->addRooms($single_room, 10);
$request->addRooms($twin_room, 2);

$malaga_destination = new tgx\resources\Destination($malaga, '13/09/2019', '14/09/2019');
$torremolinos_destination = new tgx\resources\Destination($torremolinos, '14/09/2019', '15/09/2019');

// Has custom rooming and notes
$room_only = new tgx\resources\Board('RO', 'Room Only');
$marbella_destination = new tgx\resources\Destination($marbella, '16/09/2019', '17/09/2019', $room_only);
$marbella_destination->addRooms($single_room, 14);

$request->addDestination($malaga_destination);
$request->addDestination($torremolinos_destination);
$request->addDestination($marbella_destination);

$client->requests()->tour($request);

echo 'Tour ' . $request->id() . ' created';

$client->close();

?>