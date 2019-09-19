<?php


namespace App\Repository;


use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Unirest\Request;

class ClientRepository
{
    private $container;
    private $url;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->url = $this->container->getParameter('url') . 'Api/Aluno';
    }

    public function getClients($token): array
    {
        try {
            $authorization = 'Bearer ' . $token;

            $header = array("Authorization" => $authorization);

            $response = Request::get($this->url, $header);

            return json_decode($response->raw_body, true);

        } catch (Exception $ex) {
            throw $ex;
        }
    }
}