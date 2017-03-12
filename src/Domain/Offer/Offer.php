<?php declare(strict_types = 1);

namespace Mps\Domain\Offer;

/**
 * Class Offer
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class Offer
{
    private $id;

    private $productId;

    private $quantity;

    private $price;

    public function __construct($id, $productId, $quantity, $price)
    {
        $this->id        = $id;
        $this->productId = $productId;
        $this->quantity  = $quantity;
        $this->price     = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
