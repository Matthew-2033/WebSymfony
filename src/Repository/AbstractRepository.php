<?php


namespace App\Repository;


use App\Entity\Response\ResponseApi;
use Unirest\Response;

abstract class AbstractRepository
{
    protected function makeAuthorization(string $token): string
    {
        return 'Bearer '. $token;
    }

    protected function createHeader(string $authorization, $contentType = 'application/json'): array
    {
        return array("Authorization" => $authorization, 'Content-Type' => $contentType);
    }

    protected function getResponse(Response $response): ResponseApi
    {
        $code = $response->code;
        $success = $response->body->sucess ?? false;
        $data = $response->body->data ?? null;
        $message = $response->body->mensagem ?? null;

        $error = $this->setErrorMessage($response);

        $response = new ResponseApi($code, $success, $data, $message, $error);

        return $response;
    }

    private function setErrorMessage($response)
    {
        if (isset($response->body->errorMessages)) {
            return $response->body->errorMessages;
        }

        if (isset($response->body->error)) {
            return $response->body->error;
        }

        return null;
    }

}