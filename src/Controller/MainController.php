<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return new Response('<h1> Welcome </h1>');
    }

    /**
     * @Route("/custom/{name?}", name="custom")
     */
    public function custom(Request $request): Response
    {
        dump($request);
        return new Response('<h1> Custom </h1>');
    }
}
