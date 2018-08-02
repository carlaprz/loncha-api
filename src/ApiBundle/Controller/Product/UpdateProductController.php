<?php

namespace ApiBundle\Controller\Product;

use ApiBundle\Service\Product\CreateProductService;
use ApiBundle\Service\Product\UpdateProductService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UpdateProductController extends Controller
{
    /**
     * @Route("/products/{id}", methods="PUT")
     *
     * @param int $id
     * @param Request $request
     * @param UpdateProductService $updateProductService
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function UpdateProductAction(int $id, Request $request, UpdateProductService $updateProductService)
    {
        $data = \json_decode($request->getContent(), true);
        $product = $updateProductService->update($id, $data['data']['attributes']);

        return $this->json($product, 200);
    }

}
