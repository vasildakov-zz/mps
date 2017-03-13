<?php

namespace Mps\Domain\Basket;

use Mps\Domain\Product\ProductInterface;

/**
 * BasketItemInterface
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
interface BasketItemInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return int
     */
    public function getQuantity();

    /**
     * @return float
     */
    public function getTotalPrice();

    /**
     * @param  ProductInterface
     * @return void
     */
    public function add(ProductInterface $product);

    /**
     * @return array
     */
    public function toArray();
}
