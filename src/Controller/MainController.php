<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homeIndex")
     * @return Response
     *
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/custom/{name?}", name="homeCustom")
     * @param Request $request
     * @return Response
     */
    public function custom(Request $request): Response
    {
        $name = $request->get('name');
        return $this->render('home/custom.html.twig', [ 'name'=> $name ]);
    }
}
