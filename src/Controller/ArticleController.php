<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article_new')]
    public function new(Request $request, ArticleRepository $articleRepository): Response
    {
        $article= new Article();
        $form = $this->createForm(ArticleType::class, $article,
            [
                'codePostal' => '10000'
            ]);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articleRepository->save($article, true);
            return $this->redirectToRoute('app_article_new');
        }

        return $this->render('article/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
