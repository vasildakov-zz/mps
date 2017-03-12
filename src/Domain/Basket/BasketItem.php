<?php declare(strict_types = 1);

namespace Mps\Domain\Basket;

use ArrayAccess;
use ArrayIterator;

use Mps\Domain\Storage\StorageInterface;
use Mps\Domain\Product\ProductInterface;

/**
 * Class Basket
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class BasketItem implements ArrayAccess, BasketItemInterface
{
    /**
     * @var string $id
     */
    private $id;

    /**
     * @var int $quantity
     */
    private $quantity;

    /**
     * @var float $total
     */
    private $total;

    /**
     * @var array $total
     */
    private $elements;


    /**
     * This is only for testing
     */
    private $offers = [
        [
            'productId'  => '1',
            'quantity' => 3,
            'price'    => 130
        ],
        [
            'productId'  => '2',
            'quantity' => 2,
            'price'    => 45
        ],
    ];


    /**
     * @param string  $id
     * @param array   $elements
     */
    public function __construct($id, array $elements = [])
    {
        $this->id       = $id;
        $this->elements = $elements;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getQuantity()
    {
        return count($this->elements);
    }


    public function getTotalPrice()
    {
        $offer = $this->getOffer();

        if (!$offer) {
            foreach ($this->elements as $element) {
                $this->total += $element->getPrice();
            }
        } else {
            $chunked = array_chunk($this->elements, $offer['quantity']);
            foreach ($chunked as $array) {
                if (count($array) == $offer['quantity']) {
                    $this->total += $offer['price'];
                } else {
                    foreach ($array as $element) {
                        $this->total += $element->getPrice();
                    }
                }
            }
        }

        return $this->total;
    }


    public function add($element)
    {
        $this->elements[] = $element;
    }


    public function getOffer()
    {
        $key = array_search($this->id, array_column($this->offers, 'productId'));
        return (false !== $key) ? $this->offers[$key] : null;
    }


    public function offsetExists($offset)
    {
        return isset($this->elements[$offset]);
    }


    public function offsetGet($offset)
    {
        return isset($this->elements[$offset]) ? $this->elements[$offset] : null;
    }


    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->elements[] = $value;
        } else {
            $this->elements[$offset] = $value;
        }
    }


    public function offsetUnset($offset)
    {
        unset($this->elements[$offset]);
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
            'elements' => $this->elements,
        ];
    }

    public function getIterator()
    {
        return new ArrayIterator($this->elements);
    }
}
