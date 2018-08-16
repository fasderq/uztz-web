<?php

namespace AppBundle\Controller;


use AppBundle\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Response
     */
    public function blockAction(): Response
    {
        $categories = $this->repository->getCategories();

        return $this->render('@App/front/categories/block.html.twig', ['categories' => $categories ?? []]);
    }
}