<?php

namespace ApiBundle\Factory;


use ApiBundle\Entity\Product;

class ProductFactory
{
    public function create(array $data)
    {
        $product = new Product();

        $product->setName($data['name'])
            ->setDescription($data['description'])
            ->setSlug($data['slug']);

        return $product;
    }
}