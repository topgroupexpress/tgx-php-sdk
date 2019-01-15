<?php
namespace tgx\resources;

class ContentBase
{
    private $id;
    private $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    function __tostring()
    {
        return $this->id . ' => ' . $this->name;
    }

    public function id() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function name() {
        return $this->name;
    }
}
?>