<?php declare(strict_types = 1);

namespace Mps\Domain\Basket;

use Mps\Domain\Storage\StorageInterface;
use Mps\Domain\Product\ProductInterface;

/**
 * Class Basket
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class Basket implements BasketInterface
{
    /**
     * @var BasketId
     */
    private $id;

    /**
     * @var BasketItem[]
     */
    private $items = [];


    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string $id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param ProductInterface $product
     */
    public function add(ProductInterface $product)
    {
        $productId = $product->getId();

        if ($this->has($productId)) {
            $item = $this->find($productId);
            $item->add($product);
        } else {
            $item = new BasketItem($productId);
            $item->add($product);
            $this->items[] = $item;
        }
    }

    /**
     * @param string $productId
     */
    public function has($productId)
    {
        return !is_null($this->find($productId));
    }

    /**
     * @param string $productId
     */
    public function find($productId)
    {
        foreach ($this->items as $item) {
            if ($productId === $item->getId()) {
                return $item;
            }
        }
        return null;
    }

    /**
     * @return float
     */
    public function total()
    {
        return (float) array_sum(
            array_map(function (BasketItem $item) {
                return $item->getTotalPrice();
            }, $this->items)
        );
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Export the cart as an array
     *
     * @return array
     */
    public function toArray() : array
    {
        return [
            'id'    => $this->getId(),
            'items' => array_map(function (BasketItem $item) {
                return $item->toArray();
            }, $this->items),
        ];
    }
}
