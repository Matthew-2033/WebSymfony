<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Manager\DashboardManager;


class DashboardController extends BaseController
{
    private $dashboardManager;

    public function __construct(DashboardManager $dashboardManager)
    {
        $this->dashboardManager = $dashboardManager;
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(Request $request)
    {
        $token = $this->getToken($request);
        $content = $this->dashboardManager->getDashboardInformation($token);
        //dd($content);
        return $this->render('dashboard/index.html.twig', [
            'chart_avgGrease' => json_encode($content->getAvgGrease()),
        ]);
    }
}
