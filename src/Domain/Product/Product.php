<?php declare(strict_types = 1);

namespace Mps\Domain\Product;

use Mps\Domain\Money\Money;

/**
 * Product
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class Product implements ProductInterface
{
    /**
     * @var ProductId $id
     */
    private $id;

    /**
     * @var ProductName $name
     */
    private $name;

    /**
     * @var Money $price
     */
    private $price;

    /**
     * @param ProductId    $id
     * @param ProductName  $name
     * @param Money        $price
     */
    public function __construct(ProductId $id, ProductName $name, Money $price)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPrice($price);
    }

    /**
     * @param ProductId $id
     */
    private function setId(ProductId $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ProductId
     */
    public function getId() : ProductId
    {
        return $this->id;
    }


    /**
     * @param ProductName $name
     */
    private function setName(ProductName $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ProductName
     */
    public function getName() : ProductName
    {
        return $this->name;
    }

    /**
     * @param Money $price
     */
    private function setPrice(Money $price) : self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Money
     */
    public function getPrice() : Money
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id'    => $this->getId(),
            'name'  => $this->getName(),
            'price' => $this->getPrice(),
        ];
    }
}
