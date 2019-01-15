<?php
namespace tgx\resources;

require_once 'RequestBase.php';

class TourRequest extends RequestBase
{
    private $agency;
    private $destinations;

    function __construct($agency, $board, $rating, $budget=0.0, $notes='', $agency_reference='', $id=null)
    {
        parent::__construct($board, $rating, $budget, $notes, $agency_reference, $id);
        $this->agency = $agency;
        $this->destinations = [];
    }

    public function agency() {
        return $this->agency;
    }

    public function destinations()
    {
        return $this->destinations;
    }

    public function addDestination($destination)
    {
        array_push($this->destinations, $destination);
    }
}

?>