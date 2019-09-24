<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use JsonSerializable;
use DateTime;

class Client implements JsonSerializable
{

    private $uuid;

    /**
     * @var name
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var bornDate
     * @Assert\NotBlank()
     */
    private $bornDate;

    /**
     * @var lastEvaluation
     */
    private $lastEvaluation;

    /**
     * @var sex
     * @Assert\NotBlank()
     */
    private $sex;

    /**
     * @var email
     * @Assert\Email()
     */
    private $email;

    /**
     * @var cpf
     * @Assert\NotBlank()
     */
    private $cpf;

    /**
     * @var active
     * @Assert\NotBlank()
     */
    private $active = true;

    /**
     * @param string
     * @return string
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param mixed $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @param string
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return DateTime
     */
    public function getBornDate(): ?string
    {
        return $this->bornDate;
    }

    /**
     * @param DateTime $bornDate
     */
    public function setBornDate(DateTime $bornDate): void
    {
        $this->bornDate = $bornDate->format("Y-m-d");
    }

    /**
     * @return DateTime
     */
    public function getLastEvaluation(): ?DateTime
    {
        return $this->lastEvaluation;
    }

    /**
     * @param DateTime $lastEvaluation
     */
    public function setLastEvaluation($lastEvaluation): void
    {
        $this->lastEvaluation = $lastEvaluation;
    }

    /**
     * @return mixed
     */
    public function getSex(): ?string
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }

    public function jsonSerialize()
    {
        return array(
            'id' => $this->getUuid(),
            'nome' => $this->getName(),
            'sexo' => $this->getSex(),
            'cpf' => $this->getCpf(),
            'email' => $this->getEmail(),
            'dataNascimento' => $this->getBornDate(),
            'ultimaAvaliacao' => $this->getLastEvaluation(),
            'ativo' => $this->getActive()
        );
    }

    public function constructObject($request)
    {
        $this->setName($request->get('name'));
        $this->setEmail($request->get('email'));
        $this->setBornDate(new DateTime( $request->get('borndate')));
        $this->setCpf($request->get('cpf'));
        $this->setSex($request->get('sex'));
    }
}
