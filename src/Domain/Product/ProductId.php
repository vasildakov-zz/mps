<?php declare(strict_types = 1);

namespace Mps\Domain\Product;

/**
 * ProductId
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class ProductId implements ProductIdInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function equalsTo(ProductId $other)
    {
        return $other->getId() === $this->getId();
    }
}
