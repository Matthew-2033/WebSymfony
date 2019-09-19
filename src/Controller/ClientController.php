<?php

namespace App\Controller;


use App\Entity\Client;
use App\Form\ClientForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use App\Manager\ClientManager;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ClientController
 * @package App\Controller
 * @Route("/client")
 */
class ClientController extends AbstractController
{
    private $manager;

    public function __construct(ClientManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @Route("/", name="client")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $token = $request->getSession()->get('token');
        $clients = $this->manager->getClients($token);

        return $this->render( 'client/index.html.twig', [
            'clients' => $clients['data']
        ]);
    }

    /**
     * @Route("/form", name="client_form")
     */
    public function formClient(Request $request)
    {
        /** If the method is a GET, will just render form withou any information */
        $form = $this->createForm(ClientForm::class);

        $form->handleRequest($request);

        /**
         * If the following if statement falls in to false, it will
         * also render the form but this time with the error.
         */
        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            dd($data);
            /**
             * Add Flash Message that informs the success
             * Works like a shortcut to save a message on the session and
             * only live in the session until they are read for the first time
             */
            $this->addFlash('success', 'Usuário Cadastrado');

            return $this->redirect('/client');
        }
        return $this->render('client/form.html.twig', [
            'clientForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/process", name="client_proccess")
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

}
