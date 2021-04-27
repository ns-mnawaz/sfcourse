<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/health", name="health.")
 */
class Health extends AbstractController
{
    /**
     * @Route("/", name="healthIndex")
     * @return JsonResponse
     *
     */
    public function index(): JsonResponse
    {
        return new JsonResponse(['data' => 123]);
    }
}
