<?php

namespace App\Controller;

use App\Services\Antispam;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index(SessionInterface $session, Antispam $antispam)
    {
        $this->addFlash('info', 'je suis un message flash');

        $session->set('userId', 91);
        $spam = "nok";

        if($antispam->isSpam("testter")) {
            $spam = "ok";
        }

        $uid = $session->get('userId');
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'userId' => $uid,
            'spam' => $spam
        ]);
    }

    /** 
     * @Route("/product/{id}", name="product_view")
     */
    public function view($id, Request $request)
    {
        return new Response("test ". $id);
    }
}
