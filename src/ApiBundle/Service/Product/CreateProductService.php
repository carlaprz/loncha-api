<?php

namespace ApiBundle\Service\Product;

use ApiBundle\Entity\Product;
use ApiBundle\Factory\ProductFactory;
use Doctrine\ORM\EntityManagerInterface;

class CreateProductService
{
    /**
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * CreateProductService constructor.
     * @param ProductFactory $productFactory
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        ProductFactory $productFactory,
        EntityManagerInterface $entityManager
    ) {
        $this->productFactory = $productFactory;
        $this->em = $entityManager;
    }

    public function create(array $data): Product
    {
        $data['slug'] = \uniqid(\time());
        $product = $this->productFactory->create($data);

        $this->em->persist($product);
        $this->em->flush();

        return $product;
    }
}
