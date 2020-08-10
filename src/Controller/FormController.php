<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FormController extends AbstractController
{
    /**
     * @Route("/form/new", name="new")
     */
    public function index()
    {
        $article = new Article();
        $article->setTitle('titre de l\'artilce');
        $article->setAuthor('sariak');
        $article->setContent('Content type');

        $form = $this->createForm(ArticleType::class, $article);

        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
            'form' => $form->createView(),
        ]);
    }
}
