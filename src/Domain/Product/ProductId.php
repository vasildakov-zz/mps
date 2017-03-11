<?php

namespace Mps\Domain\Product;

/**
 * ProductId
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class ProductId implements ProductIdInterface
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function equalsTo(ProductId $other)
    {
        return $other->getId() === $this->getId();
    }
}
