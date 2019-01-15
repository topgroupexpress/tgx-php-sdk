<?php
namespace tgx\resources;

require_once 'ContentBase.php';


class Agency extends ContentBase
{
    private $contact_name;
    private $contact_email;
    private $notes;

    function __construct($name, $contact_name, $contact_email, $notes, $id=null)
    {
        parent::__construct($id, $name);
        $this->contact_name = $contact_name;
        $this->contact_email = $contact_email;
        $this->notes = $notes;
    }

    function __tostring()
    {
        return '(Agency ' . $this->id() . ') => ' . $this->name();
    }

    public function contactName() {
        return $this->contact_name;
    }

    public function contactEmail() {
        return $this->contact_email;
    }

    public function notes() {
        return $this->notes;
    }

}
?>