<?php

namespace AppBundle\Controller;


use AppBundle\Repository\MachineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MachineController extends Controller
{
    protected $repository;

    public function __construct(MachineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function showAction(Request $request): Response
    {
        $id =$request->get('id');
        $machine = $this->repository->findOneBy(['id' => $id]);

        if (!$machine) {
            throw $this->createNotFoundException();
        }

        return $this->render('@App/front/machines/single-machine.html.twig', ['machine' => $machine]);
    }

}
