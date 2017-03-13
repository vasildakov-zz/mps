<?php declare(strict_types = 1);

namespace Mps\Application;

use Mps\Domain\Product\ProductInterface;

/**
 * CheckoutInterface
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
interface CheckoutInterface
{
    /**
     * @param  ProductInterface $product
     */
    public function scan(ProductInterface $product);

    /**
     * @return float
     */
    public function total();
}
