<?php


namespace App\Manager;


use App\Repository\ClientRepository;

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
        return $clients;
    }

    public function postClient()
    {

    }
}