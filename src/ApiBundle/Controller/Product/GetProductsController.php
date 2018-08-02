<?php

namespace ApiBundle\Controller\Product;

use ApiBundle\Service\Product\GetProductsService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GetProductsController extends Controller
{
    /**
     * @Route("/products", methods="GET")
     *
     * @param GetProductsService $getProductsService
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function GetProductsAction(GetProductsService $getProductsService)
    {
        return $this->json($getProductsService->findAll(), 200);
    }

}
