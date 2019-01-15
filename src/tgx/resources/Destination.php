<?php
namespace tgx\resources;

require_once 'RequestBase.php';


class Destination extends RequestBase
{
    private $tour;
    private $country;
    private $location;
    private $check_in;
    private $check_out;

    function __construct(
        $location, $check_in, $check_out,
        $board=null, $rating=null, $budget=null, $notes=null, $agency_reference=null, $id=null
    ) {
        parent::__construct($board, $rating, $budget, null, $notes, $agency_reference, $id);
        $this->tour = null;
        $this->location = $location;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
    }

    public function id()
    {
        return $this->id;
    }

    public function country()
    {
        return $this->location->country();
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

    public function board()
    {
        if ($this->board === null) {
            if ($this->tour !== null) {
                return $this->tour->board();
            } else {
                return null;
            }
        }
        return $this->board;
    }

    public function rating()
    {
        if ($this->rating === null) {
            if ($this->tour !== null) {
                return $this->tour->rating();
            } else {
                return null;
            }
        }
        return $this->rating;
    }

    public function budget()
    {
        if ($this->budget === null) {
            if ($this->tour !== null) {
                return $this->tour->budget();
            } else {
                return null;
            }
        }
        return $this->budget;
    }

    public function rooms()
    {
        if ($this->rooms === null) {
            if ($this->tour !== null) {
                return $this->tour->rooms();
            } else {
                return null;
            }
        }
        return $this->rooms;
    }

    public function notes()
    {
        if ($this->notes === null) {
            if ($this->tour !== null) {
                return $this->tour->notes();
            } else {
                return null;
            }
        }
        return $this->notes;
    }


    public function agencyReference()
    {
        if ($this->agency_reference === null) {
            if ($this->tour !== null) {
                return $this->tour->agencyReference();
            } else {
                return null;
            }
        }
        return $this->agency_reference;
    }

    public function setTour($tour)
    {
        $this->tour = $tour;
    }

}

?>