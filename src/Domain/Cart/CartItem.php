<?php

namespace Mps\Domain\Cart;

use Mps\Domain\Product\ProductInterface;

/**
 * Class CartItem
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class CartItem implements \ArrayAccess
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var float
     */
    private $price;

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }


    public function getTotalPrice()
    {
        return $this->price;
        // return (float) $this->price * $this->quantity;
    }


    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }


    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }


    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }


    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }


    /**
     * @param  ProductInterface $product
     * @return static
     */
    public static function fromProduct(ProductInterface $product)
    {
        return new static($product->toArray());
    }


    /**
     * Export the cart item as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'data' => $this->data,
        ];
    }
}
