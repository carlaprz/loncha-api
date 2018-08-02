<?php

namespace ApiBundle\Service\Product;

use ApiBundle\Entity\Product;
use ApiBundle\Factory\ProductFactory;
use Doctrine\ORM\EntityManagerInterface;

class UpdateProductService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * UpdateProductService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->em = $entityManager;
    }

    public function update(int $id, array $data): Product
    {
        /** @var Product $product */
        $product = $this->em->getRepository(Product::class)->find($id);

        $product->setName($data['name'])->setDescription($data['description'])->setSlug($data['slug']);
        $this->em->persist($product);
        $this->em->flush();

        return $product;
    }
}
