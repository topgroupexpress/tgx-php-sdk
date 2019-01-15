<?php

namespace tgx;

require_once 'resources/SingleRequest.php';
require_once 'resources/TourRequest.php';
require_once 'resources/Destination.php';


class RequestsClient
{
    private $client;

    function __construct($client)
    {
        $this->client = $client;
    }

    function __toString()
    {
        return 'Requests Client';
    }

    public function single($request)
    {
        $form = [
            'agency' => $request->agency()->id(),
            'country' => $request->country()->id(),
            'location' => $request->location()->id(),
            'check_in' => $request->checkIn(),
            'check_out' => $request->checkOut(),
            'board' => $request->board()->id(),
            'rating' => $request->rating()->id(),
            'budget' => $request->budget(),
            'rooms' => $request->rooms(),
            'notes' => $request->notes(),
            'agency_reference' => $request->agencyReference(),
        ];

        $response = $this->client->post('/request/single', $form);

        $request->setId($response['destination']);

        return $request;
    }

    public function tour($request)
    {
        $destinations = [];
        $destinations_objs = $request->destinations();
        $arrlength = count($destinations_objs);

        for ($i = 0; $i < $arrlength; $i++) {
            $dest = $destinations_objs[$i];
            $destination = [
                'country' => $dest->country()->id(),
                'location' => $dest->location()->id(),
                'check_in' => $dest->checkIn(),
                'check_out' => $dest->checkOut(),
            ];
            if ($dest->board() !== null) {
                $destination['board'] = $dest->board()->id();
            }
            if ($dest->rating() !== null) {
                $destination['rating'] = $dest->rating()->id();
            }
            if ($dest->budget() !== null) {
                $destination['budget'] = $dest->budget();
            }
            if ($dest->rooms() !== null) {
                $destination['rooms'] = $dest->rooms();
            }
            if ($dest->notes() !== null) {
                $destination['notes'] = $dest->notes();
            }
            if ($dest->agencyReference() !== null) {
                $destination['agency_reference'] = $dest->agencyReference();
            }
            array_push($destinations, $destination);
        }

        $form = [
            'agency' => $request->agency()->id(),
            'board' => $request->board()->id(),
            'rating' => $request->rating()->id(),
            'budget' => $request->budget(),
            'rooms' => $request->rooms(),
            'notes' => $request->notes(),
            'agency_reference' => $request->agencyReference(),
            'destinations' => $destinations
        ];

        $response = $this->client->post('/request/tour', $form);

        $request->setId($response['tour']);

        for ($i = 0; $i < $arrlength; $i++) {
            $dest = $request->destinations()[$i]->setId($response['leads'][$i]);
        }

        return $request;
    }

}

?>