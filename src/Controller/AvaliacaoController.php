<?php


namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Unirest\Request;

/**
 * Class AvaliacaoRepository
 * @package App\Controller
 * @Route("/avaliacao")
 */
class AvaliacaoController extends AbstractController
{
    /**
     * @Route("/{id}")
     */
    public function getAvaliacao(Request $request, string $id)
    {

    }
}