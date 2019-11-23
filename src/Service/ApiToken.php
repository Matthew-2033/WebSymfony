<?php


namespace App\Service;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use Unirest\Request;

class ApiToken
{
    private $url;
    private $username;
    private $password;
    private $apiLogin;
    private $apiPassword;

    public function __construct(Container $container)
    {
        $this->apiLogin = $container->getParameter('api_login');
        $this->url = $container->getParameter('url') . 'oauth/token';
        $this->apiPassword = $container->getParameter('api_password');
    }

    public function getToken(string $username, string $password)
    {
        try{

            $this->username = $username;
            $this->password = $password;
            $parameters = $this->parameters();
            $authorization = 'Basic ' . $this->encode();

            $headers = array(
                "Content-Type" => 'application/x-www-form-urlencoded',
                "Authorization" => $authorization
            );

            $body = Request\Body::Form($parameters);
            $response = Request::post($this->url, $headers, $body);
            //dd($response);
            return json_decode($response->raw_body, true);

        }catch (Exception $exception) {
            throw $exception;
        }
    }

    private function encode()
    {
        $credentials = $this->apiLogin . ':' . $this->apiPassword;
        return base64_encode($credentials);
    }

    private function parameters()
    {
        return sprintf(
            'grant_type=%s&username=%s&password=%s',
            'password', $this->username, $this->password);
    }

}