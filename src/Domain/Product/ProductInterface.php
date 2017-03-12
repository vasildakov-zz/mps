<?php

namespace Mps\Domain\Product;

use Mps\Domain\Money\Money;

/**
 * ProductInterface
 */
interface ProductInterface
{
    /**
     * Returns product id
     *
     * @return ProductId
     */
    public function getId();

    /**
     * Returns product name
     *
     * @return ProductName
     */
    public function getName();

    /**
     * Returns product price
     *
     * @return Money
     */
    public function getPrice();
}
