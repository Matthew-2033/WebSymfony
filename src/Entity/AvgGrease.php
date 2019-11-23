<?php


namespace App\Entity;

use JsonSerializable;

class AvgGrease implements JsonSerializable
{

    private $sex;
    private $author;
    private $average;

    public function __construct(string $sex, string $author, float $average)
    {
        $this->setSex($sex);
        $this->setAuthor($author);
        $this->setAverage($average);
    }

    /**
     * @return mixed
     */
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * @param mixed $average
     */
    public function setAverage($average): void
    {
        $this->average = $average;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function jsonSerialize()
    {
        return array(
            'sex' => $this->getSex(),
            'author' => $this->getAuthor(),
            'average' => $this->getAverage()
        );
    }

    public function __toArray()
    {
        return call_user_func('get_object_vars', $this);
    }

}