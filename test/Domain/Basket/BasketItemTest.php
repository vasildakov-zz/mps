<?php declare(strict_types = 1);

namespace MpsTest\Domain\Cart;

use Mps\Domain\Product\Product;
use Mps\Domain\Basket\BasketItem;

/**
 * BasketItemTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class BasketItemTest extends \PHPUnit\Framework\TestCase
{
    protected $product;

    protected function setUp()
    {
        $this->product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $item = new BasketItem(1);

        self::assertInstanceOf(BasketItem::class, $item);
    }

    /**
     * @test
     */
    public function itCanSetOffset()
    {
        $item = new BasketItem(1);

        $item->add($this->product);
        $item->add($this->product);

        self::assertEquals(2, $item->getQuantity());
    }

    /**
     * @test
     */
    public function itCanBeExportedToArray()
    {
        $item = new BasketItem(1);

        $item->add($this->product);

        self::assertInternalType('array', $item->toArray());
    }

    /**
     * @test
     */
    public function itCanReturnArrayIterator()
    {
        $item = new BasketItem(1);

        $item->add($this->product);
        $item->add($this->product);

        self::assertInstanceOf(\ArrayIterator::class, $item->getIterator());
    }


    /**
     * @test
     */
    public function itCanFindAnOffer()
    {
        $item = new BasketItem('1');

        $item->add(new Product('1', 'Strawberries', 50));

        self::assertNotNull($item->getOffer());
    }
}
