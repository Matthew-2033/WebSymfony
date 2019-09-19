<?php


namespace App\Entity;


use JsonSerializable;
use App\Helpers\Calculation\Calculation;


/**
 * Class Dashboard
 * @package App\Entity
 * Classe Responsável por armazenar e validar as informações que
 * serão ser apresentadas no dashboard principal
 */
class Dashboard implements JsonSerializable
{
    private $total;
    private $percentageMale;
    private $percentageFemale;
    private $porcentageValued;
    private $percentageActive;
    private $porcentageUnvalued;
    private $percentageInactive;
    private $avgGrease;

    public function __construct(int $total)
    {
        $this->setTotal($total);
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total): void
    {
        $this->total = $total;
    }


    /**
     * @return mixed
     */
    public function getPercentageActive()
    {
        return $this->percentageActive;
    }

    /**
     * @param mixed $percentageActive
     */
    public function setPercentageActive($percentageActive): void
    {
        $this->percentageActive = $this->calculatePorcentage($percentageActive);
    }

    /**
     * @return mixed
     */
    public function getPercentageInactive()
    {
        return $this->percentageInactive;
    }

    /**
     * @param mixed $percentageInactive
     */
    public function setPercentageInactive($percentageInactive): void
    {
        $this->percentageInactive = $this->calculatePorcentage($percentageInactive);
    }

    /**
     * @return mixed
     */
    public function getPercentageMale()
    {
        return $this->percentageMale;
    }

    /**
     * @param mixed $percentageMale
     */
    public function setPercentageMale($percentageMale): void
    {
        $this->percentageMale = $this->calculatePorcentage($percentageMale);
    }

    /**
     * @return mixed
     */
    public function getPercentageFemale()
    {
        return $this->percentageFemale;
    }

    /**
     * @param mixed $percentageFemale
     */
    public function setPercentageFemale($percentageFemale): void
    {
        $this->percentageFemale = $this->calculatePorcentage($percentageFemale);
    }

    /**
     * @return mixed
     */
    public function getPorcentageValued()
    {
        return $this->porcentageValued;
    }

    /**
     * @param mixed $porcentageValued
     */
    public function setPorcentageValued($porcentageValued): void
    {
        $this->porcentageValued = $this->calculatePorcentage($porcentageValued);
    }

    /**
     * @return mixed
     */
    public function getPorcentageUnvalued()
    {
        return $this->porcentageUnvalued;
    }

    /**
     * @param mixed $porcentageUnvalued
     */
    public function setPorcentageUnvalued($porcentageUnvalued): void
    {
        $this->porcentageUnvalued = $this->calculatePorcentage($porcentageUnvalued);
    }

    /**
     * @return mixed
     */
    public function getAvgGrease(): array
    {
        return $this->avgGrease;
    }

    /**
     * @param mixed $avgGrease
     */
    public function setAvgGrease(array $avgGrease): void
    {

        $this->avgGrease = $avgGrease;
    }

    private function calculatePorcentage($value)
    {
        $porcentage = Calculation::regularPercentage($this->total, $value);
        return $porcentage;
    }


    public function setContent(array $content): self
    {
        $this->setPercentageActive($content['ativo']);
        $this->setPercentageMale($content["masculino"]);
        $this->setPercentageFemale($content['feminino']);
        $this->setPercentageInactive($content['inativos']);
        $this->setPorcentageUnvalued($content['nao_avaliado']);

        return $this;
    }


    public function jsonSerialize()
    {

        return array (
            'total' => $this->getTotal(),
            'percentageMale' => $this->getPercentageMale(),
            'percentageFemale' => $this->getPercentageFemale(),
            'porcentageValued' => $this->getPorcentageValued(),
            'porcentageUnvalued' => $this->getPorcentageUnvalued(),
            'percentageInactive' => $this->getPercentageInactive(),
            'avgGrease' => $this->getAvgGrease()
        );
    }
}