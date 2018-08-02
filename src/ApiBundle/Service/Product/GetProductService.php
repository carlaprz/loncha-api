<?php

namespace ApiBundle\Service\Product;

use ApiBundle\Entity\Product;
use ApiBundle\Factory\ProductFactory;
use Doctrine\ORM\EntityManagerInterface;

class GetProductService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * CreateProductService constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function findById(int $id): ?Product
    {
        return $this->em->getRepository(Product::class)->find($id);
    }
}
