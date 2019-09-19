<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ComponentController
 * @package App\Controller
 * @Route("/component")
 */
class ComponentController extends BaseController
{

    /**
     * @Route("/card", name="component_card")
     */
    public function card(Request $request): Response
    {
        //$token = $this->getToken($request);
        return $this->render('component/card.html.twig');
    }

}