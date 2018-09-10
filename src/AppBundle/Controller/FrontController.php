<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AboutBlockRepository;
use AppBundle\Repository\MachineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{

    protected $machineRepository;
    protected $aboutBlockRepository;

    public function __construct(
        MachineRepository $machineRepository,
        AboutBlockRepository $aboutBlockRepository
    ) {
        $this->machineRepository = $machineRepository;
        $this->aboutBlockRepository = $aboutBlockRepository;
    }

    public function indexAction(): Response
    {
        $machines = $this->machineRepository->getHot();

        return $this->render('@App/front/main/main.html.twig', ['machines' => $machines]);
    }

    public function contactsAction(): Response
    {
        return $this->render('@App/front/contacts/contacts.html.twig');
    }

    public function aboutAction(): Response
    {
        $blocks =  $this->aboutBlockRepository->getBlocks();

        return $this->render('@App/front/about/about.html.twig', ['blocks' => $blocks]);
    }

    public function catalogAction(): Response
    {
        return $this->render('@App/front/catalog/catalog.html.twig');
    }
}