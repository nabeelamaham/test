<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class ClientController extends AbstractController
{


    
    public function list(): Response
    {
    	 $this->denyAccessUnlessGranted('ROLE_ADMIN');
    	#$this->denyAccessUnlessGranted('ROLE_USER',null,'My custom message' );

    	$clients = $this->getDoctrine()
    	->getRepository(Client::class)
    	//->findAll()   //OR
    	//->findByStatus(true);    //OR
    	//->findByStatus(false);    //OR
    	//->findBy(array('status'=> true, 'id' =>2));
    	//->findActiveClients(true);
    	->findActiveClients(false);

    	//dd($clients);
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
            'clients' => $clients,
        ]);
    }

  public function view($id): Response
    {

    	$client = $this->getDoctrine()
    	->getRepository(Client::class)
    	->find($id);   //OR
    	//->findByStatus(true);    //OR
    	//->findByStatus(false);    //OR
    	//->findBy(array('status'=> true, 'id' =>2));
    	//->findActiveClients(true);
    	//->findActiveClients(false);

    	//dd($clients);
        return $this->render('client/view.html.twig', [
            'controller_name' => 'ClientController',
            'client' => $client,
        ]);
    }

}
