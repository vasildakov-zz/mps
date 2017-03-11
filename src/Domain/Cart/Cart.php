<?php declare(strict_types = 1);

namespace Mps\Domain\Cart;

use Mps\Domain\Storage\StorageInterface;

/**
 * Class Cart
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class Cart implements CartInterface
{
    /**
     * @var CartId
     */
    private $id;


    /**
     * @var CartItem[]
     */
    private $items = [];


    /**
     * @param CartIdInterface  $id
     * @param StorageInterface $storage
     */
    public function __construct(CartIdInterface $id, StorageInterface $storage)
    {
        $this->id      = $id;
        $this->storage = $storage;
    }


    public function add(CartItem $item)
    {
        $itemId = $item->getId();

        if ($this->has($itemId)) {
            $existingItem = $this->find($itemId);
            $existingItem->quantity += $item->quantity;
        } else {
            $this->items[] = $item;
        }
    }


    public function remove($itemId)
    {
        foreach ($items as $position => $item) {
            if ($itemId === $item->id) {
                unset($items[$position]);
            }
        }
    }


    public function has($itemId)
    {
        return !is_null($this->find($itemId));
    }


    public function find($itemId)
    {
        foreach ($this->items as $item) {
            if ($itemId === $item->id) {
                return $item;
            }
        }
        return;
    }


    public function all()
    {
        return $this->items;
    }

    /**
     * Get the cart total including tax.
     *
     * @return float
     */
    public function total()
    {
        return (float) array_sum(
            array_map(function (CartItem $item) {
                return $item->getTotalPrice();
            }, $this->items)
        );
    }


    /**
     * Export the cart as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id'    => $this->id,
            'items' => array_map(function (CartItem $item) {
                return $item->toArray();
            }, $this->items),
        ];
    }
}
