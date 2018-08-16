<?php

namespace AppBundle\Controller;

use AppBundle\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    protected $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }


    public function showAction(Request $request): Response
    {
        $id = $request->get('id');

        $article = $this->repository->findOneBy(['id' => $id]);

        if (!$article) {
            throw $this->createNotFoundException();
        }

        return $this->render('@App/front/news/article.html.twig', ['article' => $article]);
    }

    public function newsBlockAction(): Response
    {
        $news = $this->repository->findBy(['published' => true], ['publishedAt' => 'DESC'], 5);


        return $this->render('@App/front/news/news-block.html.twig', ['news' => $news]);
    }

    public function newsAction(Request $request): Response
    {
//        $news = $this->repository->findBy(['published' => true], ['publishedAt' => 'DESC']);
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AppBundle:Article a";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $news = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
//
//        dump($news);
//        die;

        return $this->render('@App/front/news/news.html.twig', ['news' => $news]);
    }

}