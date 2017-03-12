<?php

namespace Mps\Domain\Basket;

use Mps\Domain\Product\ProductInterface;

interface BasketInterface
{
    public function add(ProductInterface $product);

    public function total();

    public function getItems();

    public function toArray();
}
