<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Manager\ClientManager;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ClientController
 * @package App\Controller
 * @Route("/avaliado")
 */
class ClientController extends AbstractController
{
    private $manager;

    public function __construct(ClientManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @Route("/", name="client_list")
     */
    public function index(Request $request)
    {
        try{
            $token = $request->getSession()->get('token');
            $clients = $this->manager->getClients($token);
            
            return $this->render( 'client/index.html.twig', [
                'clients' => $clients                
            ]);

        } catch (UnauthorizedHttpException $responseException) {
            return $this->redirectToRoute("app_logout");

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @Route("/cadastra", name="client_form")
     */
    public function formClient(Request $request)
    {
        /** If the method is a GET, will just render form without any information */
        $form = $this->createForm(ClientForm::class);

        $form->handleRequest($request);

        $token = $request->getSession()->get('token');
        /**
         * If the following if statement falls in to false, it will
         * also render the form but this time with the error.
         */
        if ($form->isSubmitted() && $form->isValid()) {

            $client = $form->getData();
            $response = $this->manager->postClient($token, $client);

            
            /**
             * Add Flash Message that informs the success
             * Works like a shortcut to save a message on the session and
             * only live in the session until they are read for the first time
             */
            if($response->getSuccess()) {
                $this->addFlash('success', 'Usuário Cadastrado');
            }

            return $this->redirect('/avaliado');
        }
        return $this->render('client/form.html.twig', [
            'clientForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/processa", name="client_proccess")
     */
    public function proccessClient(Request $request, ValidatorInterface $validator)
    {
        $client = new Client();
        $client->constructObject($request);
        $client->setActive(true);
        $error = $validator->validate($client);
        dd((string) $error);
        dd($client->jsonSerialize());
    }

    /**
     * @Route("/changeStatus/{id}", name="change_status")
     */
    public function changeStatus(Request $request, string $id)
    {
        $token = $request->getSession()->get('token');
        $response = $this->manager->changeStatus($token, $id);
        print_r($response);
        die();
        return new JsonResponse($response->getCode(), $response);
    }
}
