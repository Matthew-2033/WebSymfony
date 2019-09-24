<?php


namespace App\Repository;


use App\Entity\Client;
use App\Entity\Response\ResponseApi;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Unirest\Request;

class ClientRepository extends AbstractRepository
{
    const URL_ALUNO = 'Api/Aluno';
    private $container;
    private $url;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->url = $this->container->getParameter('url') . self::URL_ALUNO;
    }

    public function getClients($token): ResponseApi
    {
        try {
            $authorization = $this->makeAuthorization($token);

            $header = array("Authorization" => $authorization);

            $response = Request::get($this->url, $header);
            $response = $this->getResponse($response);

            return $response;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function postClient($token, Client $client)
    {
        try {

            $authorization = $this->makeAuthorization($token);

            $header = array("Authorization" => $authorization, 'Content-Type' => 'application/json');

            $response = Request::post($this->url, $header, json_encode($client));

            return $this->getResponse($response);

        } catch (Exception $ex) {

        }
    }
}