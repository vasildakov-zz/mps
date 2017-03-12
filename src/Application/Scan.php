<?php declare(strict_types = 1);

namespace Mps\Application;

use Mps\Domain\Basket\Basket;
use Mps\Domain\Basket\BasketInterface;
use Mps\Domain\Product\ProductInterface;

/**
 * Scan
 */
class Scan implements ScanInterface
{
    /**
     * @var BasketInterface
     */
    private $basket;

    /**
     * @param BasketInterface $basket
     */
    public function __construct(BasketInterface $basket)
    {
        $this->basket = $basket;
    }

    /**
     * @param  ProductInterface $product
     */
    public function __invoke(ProductInterface $product)
    {
        $this->basket->add($product);

        return true;
    }
}
