<?php


namespace App\Manager;


use App\Entity\Client;
use App\Repository\ClientRepository;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;


class ClientManager
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getClients($token): array
    {

        $clients = $this->clientRepository->getClients($token);

        if ($clients->getCode() == 401) {
            throw new UnauthorizedHttpException($clients->getCode(),'Não foi possível realizar login, tente novamente');
        }

        return $clients->getData();
    }

    public function postClient($token, Client $client)
    {
        $return = $this->clientRepository->postClient($token, $client);
        return $return;
    }
}