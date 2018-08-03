<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function indexAction(): Response
    {

        return $this->render('general/index.html.twig', []);
    }

    public function headerAction(): Response
    {
        return $this->render('general/header.html.twig');
    }

}
