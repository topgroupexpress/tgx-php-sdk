<?php

namespace tgx;

require_once 'resources/Agency.php';


class AgenciesClient
{
    private $client;

    function __construct($client)
    {
        $this->client = $client;
    }

    function __toString()
    {
        return 'Agencies Client';
    }

    public function add($agency)
    {
        $request = [
            'name' => $agency->name(),
            'contact_name' => $agency->contactName(),
            'contact_email' => $agency->contactEmail(),
            'notes' => $agency->notes()
        ];

        $response = $this->client->post('/clients/agencies/add', $request);

        $agency->setId($response['id']);

        return $agency;
    }

    public function all()
    {
        $agencies = $this->client->get('/clients/agencies');
        $arrlength = count($agencies);

        $result = array();

        for ($i = 0; $i < $arrlength; $i++) {
            $agency = $agencies[$i];
            array_push($result, new resources\Agency(
                $agency['name'],
                $agency['contact_name'],
                $agency['contact_email'],
                $agency['notes'],
                $agency['id']
            ));
        }

        return $result;
    }

}

?>