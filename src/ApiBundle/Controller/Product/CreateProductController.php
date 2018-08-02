<?php

namespace ApiBundle\Controller\Product;

use ApiBundle\Service\Product\CreateProductService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CreateProductController extends Controller
{
    /**
     * @Route("/products", methods="POST")
     *
     * @param Request $request
     * @param CreateProductService $createProductService
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function CreateProductAction(Request $request, CreateProductService $createProductService)
    {
        $data = \json_decode($request->getContent(), true);
        $product = $createProductService->create($data['data']['attributes']);

        return $this->json($product, 201);
    }

}
