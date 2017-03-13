<?php declare(strict_types = 1);

namespace Mps\Domain\Offer;

/**
 * Class Offer
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class Offer
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $productId;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var float
     */
    private $price;

    /**
     * @param string $id
     * @param string $productId
     * @param int    $quantity
     * @param float  $price
     */
    public function __construct($id, $productId, $quantity, $price)
    {
        $this->id        = $id;
        $this->productId = $productId;
        $this->quantity  = $quantity;
        $this->price     = $price;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}
