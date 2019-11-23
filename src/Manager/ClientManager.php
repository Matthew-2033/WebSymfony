<?php


namespace App\Manager;


use App\Entity\Client;
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
        $clients = array();
        $response = $this->clientRepository->getClients($token);

        $response->verifyResponse();
        $clients = $response->getData();        

        return $clients;
    }

    public function postClient($token, Client $client)
    {
        $return = $this->clientRepository->postClient($token, $client);
        return $return;
    }

    public function changeStatus(string $token, string $id)
    {
        return $this->clientRepository->deleteClient($token, $id);
    }
}