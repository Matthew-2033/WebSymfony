<?php

namespace App\Controller;

use App\Manager\ClientManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Manager\DashboardManager;


class DashboardController extends BaseController
{
    private $dashboardManager;
    private $clientManager;

    public function __construct(DashboardManager $dashboardManager, ClientManager $clientManager)
    {
        $this->dashboardManager = $dashboardManager;
        $this->clientManager = $clientManager;
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(Request $request)
    {
        $token = $this->getToken($request);

        $content = $this->dashboardManager->getDashboardInformation($token);
        $clients = $this->clientManager->getClients($token);

        return $this->render('dashboard/index.html.twig', [
            'chart_avgGrease' => json_encode($content->getAvgGrease()),
            'clients' => $clients
        ]);
    }
}
