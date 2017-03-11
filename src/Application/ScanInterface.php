<?php declare(strict_types = 1);

namespace Mps\Application;

use Mps\Domain\Product\ProductInterface;

/**
 * ScanInterface
 */
interface ScanInterface
{
    /**
     * @param  ProductInterface $product
     */
    public function __invoke(ProductInterface $product);
}
