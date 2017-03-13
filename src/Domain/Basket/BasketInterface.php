<?php

namespace Mps\Domain\Basket;

use Mps\Domain\Product\ProductInterface;

/**
 * BasketInterface
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
interface BasketInterface
{
    /**
     * @param  ProductInterface $product
     * @return void
     */
    public function add(ProductInterface $product);

    /**
     * @return float
     */
    public function total();

    /**
     * @return array
     */
    public function getItems();

    /**
     * @return array
     */
    public function toArray();
}
