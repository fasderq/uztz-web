<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{

    public function indexAction(): Response
    {
        return $this->render('@App/front/main/main.html.twig');
    }

    public function contactsAction(): Response
    {
        return $this->render('@App/front/contacts/contacts.html.twig');
    }
}