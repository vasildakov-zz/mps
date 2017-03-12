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
    public function __construct($id, $name, $price)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPrice($price);
    }

    /**
     * @param ProductId $id
     */
    private function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ProductId
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param ProductName $name
     */
    private function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ProductName
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Money $price
     */
    private function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Money
     */
    public function getPrice()
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
