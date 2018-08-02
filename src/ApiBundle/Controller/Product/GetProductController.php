<?php

namespace ApiBundle\Controller\Product;

use ApiBundle\Entity\Product;
use ApiBundle\Service\Product\GetProductService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GetProductController extends Controller
{
    /**
     * @Route("/products/{id}", methods="GET")
     *
     * @param int $id
     * @param GetProductService $getProductService
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function GetProductAction(int $id, GetProductService $getProductService)
    {
        $product = $getProductService->findById($id);

        if ($product instanceof  Product) {
            return $this->json($product, 200);
        }

        throw $this->createNotFoundException('Product not found');
    }

}
