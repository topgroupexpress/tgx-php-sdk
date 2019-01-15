<?php
namespace tgx\resources;

require_once 'ContentBase.php';


class Location extends ContentBase {
    private $country;

    function __construct($id, $name, $country)
    {
        parent::__construct($id, $name);
        $this->country = $country;
    }

    function __tostring()
    {
        return $this->id() . ' => ' . $this->name() . ' (' . $this->country->name() . ')';
    }

    public function country() {
        return $this->country;
    }
}

?>