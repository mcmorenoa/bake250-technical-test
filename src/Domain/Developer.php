<?php


namespace App\Domain;


class Developer implements \JsonSerializable
{
    private $id;
    private $name;
    private $age;

    /**
     * Developer constructor.
     * @param $id
     * @param $name
     * @param $age
     */
    public function __construct($id, $name, $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id . ' ' . $this->name . ' ' . $this->age;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    public function jsonSerialize()
    {
        return (object) get_object_vars($this);
    }
}