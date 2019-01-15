<?php

namespace tgx;

require_once 'resources/Country.php';
require_once 'resources/Location.php';
require_once 'resources/Room.php';
require_once 'resources/Board.php';
require_once 'resources/Rating.php';


class ContentClient
{
    private $client;

    function __construct($client)
    {
        $this->client = $client;
    }

    function __toString() {
        return 'Content Client';
    }

    public function fetchAllCountries() {
        $countries = $this->client->get('/content/countries');
        $arrlength = count($countries);

        $result = array();

        for ($i = 0; $i < $arrlength; $i++) {
            $country = $countries[$i];
            array_push($result, new resources\Country($country['id'], $country['name']));
        }

        return $result;
    }

    public function fetchCountryLocations($country) {
        $locations = $this->client->get('/content/countries/' . $country->id() . '/locations');
        $arrlength = count($locations);

        $result = array();

        for ($i = 0; $i < $arrlength; $i++) {
            $location = $locations[$i];
            array_push($result, new resources\Location($location['id'], $location['name'], $country));
        }

        return $result;
    }

    public function fetchAllRooms() {
        $rooms = $this->client->get('/content/rooms');
        $arrlength = count($rooms);

        $result = array();

        for ($i = 0; $i < $arrlength; $i++) {
            $room = $rooms[$i];
            array_push($result, new resources\Room($room['id'], $room['name']));
        }

        return $result;
    }

    public function fetchAllBoards() {
        $boards = $this->client->get('/content/boards');
        $arrlength = count($boards);

        $result = array();

        for ($i = 0; $i < $arrlength; $i++) {
            $board = $boards[$i];
            array_push($result, new resources\Board($board['id'], $board['name']));
        }

        return $result;
    }

    public function fetchAllRatings() {
        $ratings = $this->client->get('/content/ratings');
        $arrlength = count($ratings);

        $result = array();

        for ($i = 0; $i < $arrlength; $i++) {
            $rating = $ratings[$i];
            array_push($result, new resources\Rating($rating['id'], $rating['name']));
        }

        return $result;
    }

}

?>