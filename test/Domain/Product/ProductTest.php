<?php declare(strict_types = 1);

namespace MpsTest\Domain\Product;

use Mps\Domain\Product;
use Mps\Domain\Money;

/**
 * ProductIdTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class ProductTest extends \PHPUnit\Framework\TestCase
{
    protected $id;

    protected $name;

    protected $price;

    protected function setUp()
    {
        $this->id = $this->getMockBuilder(Product\ProductId::class)->disableOriginalConstructor()->getMock();

        $this->name = $this->getMockBuilder(Product\ProductName::class)->disableOriginalConstructor()->getMock();

        $this->price = $this->getMockBuilder(Money\Money::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $product = new Product\Product($this->id, $this->name, $this->price);

        self::assertInstanceOf(Product\ProductInterface::class, $product);
    }


    /**
     * @test
     */
    public function itCanBeConvertedToArray()
    {
        $product = new Product\Product($this->id, $this->name, $this->price);

        self::assertInternalType('array', $product->toArray());
    }
}
