<?php declare(strict_types = 1);

namespace Mps\Application;

use Mps\Domain\Cart\CartItem;
use Mps\Domain\Cart\CartInterface;
use Mps\Domain\Product\ProductInterface;

/**
 * Scan
 */
class Scan implements ScanInterface
{
    /**
     * @var CartInterface
     */
    private $cart;

    /**
     * @param CartInterface $cart
     */
    public function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @param  ProductInterface $product
     */
    public function __invoke(ProductInterface $product)
    {
        $this->cart->add(
            CartItem::fromProduct($product)
        );

        return true;
    }
}
