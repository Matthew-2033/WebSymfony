<?php


namespace App\Manager;

use App\Entity\AvgGrease;
use App\Repository\DashboardRepository;
use App\Entity\Dashboard;

class DashboardManager
{
    private $dashboardRepository;
    private $dashboardInfomation;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getDashboardInformation($token): Dashboard
    {
        $average = array();

        $information = $this->dashboardRepository->getInformation($token);

        $this->dashboardInfomation = new Dashboard($information['data']['total']);
        $this->dashboardInfomation->setContent($information['data']);

        foreach ($information['data']['mediaPorcentagem'] as $key) {
            $average[] = new AvgGrease($key['sexo'], $key['autor'], (float) $key['media']);
        }

        $this->dashboardInfomation->setAvgGrease($average);

        return $this->dashboardInfomation;
    }
}