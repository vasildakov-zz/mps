<?php declare(strict_types = 1);

namespace Mps\Domain\Cart;

/**
 * Class CartId
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class CartId implements CartIdInterface
{
    /**
     * @var string
     */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  CartId $other
     * @return bool
     */
    public function equalsTo(CartId $other)
    {
        return $other->getId() === $this->getId();
    }
}
