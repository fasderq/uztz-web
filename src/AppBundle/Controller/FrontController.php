<?php

namespace AppBundle\Controller;

use AppBundle\Repository\MachineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{

    protected $repository;

    public function __construct(MachineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function indexAction(): Response
    {
        $machines = $this->repository->getHot();

        return $this->render('@App/front/main/main.html.twig', ['machines' => $machines]);
    }

    public function contactsAction(): Response
    {
        return $this->render('@App/front/contacts/contacts.html.twig');
    }

    public  function aboutAction(): Response
    {
        return $this->render('@App/front/about/about.html.twig');
    }

    public function  catalogAction(): Response
    {
        return $this->render('@App/front/catalog/catalog.html.twig');
    }
}