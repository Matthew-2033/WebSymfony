<?php


namespace App\Service;
use JsonSerializable;

class JsonSerializer implements JsonSerializable
{

    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function jsonSerialize()
    {
        return $this->array;
    }
}