<?php
namespace tgx\resources;

class RequestBase
{
    private $id;
    private $board;
    private $rating;
    private $budget;
    private $rooms;
    private $notes;
    private $agency_reference;

    function __construct($board, $rating, $budget=0.0, $notes='', $agency_reference='', $id=null)
    {
        $this->id = $id;
        $this->board = $board;
        $this->rating = $rating;
        $this->budget = $budget;
        $this->notes = $notes;
        $this->agency_reference = $agency_reference;
        $this->rooms = [];
    }

    public function id() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function board() {
        return $this->board;
    }

    public function rating() {
        return $this->rating;
    }

    public function budget() {
        return $this->budget;
    }

    public function rooms() {
        return $this->rooms;
    }

    public function notes() {
        return $this->notes;
    }

    public function agencyReference() {
        return $this->agency_reference;
    }

    public function addRooms($room, $amount) {
        if ($this->rooms === null) {
            $this->rooms = [];
        }
        $this->rooms[$room->id()] = $amount;
    }

}
?>