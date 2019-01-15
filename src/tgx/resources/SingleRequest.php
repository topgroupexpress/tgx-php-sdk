<?php
namespace tgx\resources;

require_once 'RequestBase.php';

class SingleRequest extends RequestBase
{
    private $agency;
    private $country;
    private $location;
    private $check_in;
    private $check_out;

    function __construct($agency, $country, $location, $check_in, $check_out, $board, $rating, $budget=0.0, $notes='', $agency_reference='', $id=null)
    {
        parent::__construct($board, $rating, $budget, $notes, $agency_reference, $id);
        $this->agency = $agency;
        $this->country = $country;
        $this->location = $location;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
    }

    public function agency()
    {
        return $this->agency;
    }

    public function country()
    {
        return $this->country;
    }

    public function location()
    {
        return $this->location;
    }

    public function checkIn()
    {
        return $this->check_in;
    }

    public function checkOut()
    {
        return $this->check_out;
    }
}

?>