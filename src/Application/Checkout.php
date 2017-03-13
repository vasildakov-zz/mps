<?php declare(strict_types = 1);

namespace Mps\Application;

use Mps\Domain\Basket\BasketInterface;
use Mps\Domain\Product\ProductInterface;

/**
 * Class Checkout
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class Checkout implements CheckoutInterface
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
     * @return void
     */
    public function scan(ProductInterface $product)
    {
        $this->basket->add($product);
    }


    /**
     * @return float
     */
    public function total()
    {
        return $this->basket->total();
    }
}
