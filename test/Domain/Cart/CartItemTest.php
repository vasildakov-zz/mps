<?php declare(strict_types = 1);

namespace MpsTest\Domain\Cart;

use Mps\Domain\Product\Product;
use Mps\Domain\Cart\CartItem;

/**
 * CartItemTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CartItemTest extends \PHPUnit\Framework\TestCase
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
        $item = new CartItem();

        self::assertInstanceOf(CartItem::class, $item);
    }

    /**
     * @test
     */
    public function itCanCreateFromProduct()
    {
        $this->product
             ->expects(self::once())
             ->method('toArray')
             ->will(self::returnValue([]))
        ;

        $item = CartItem::fromProduct($this->product);

        self::assertInstanceOf(CartItem::class, $item);
    }

    /**
     * @test
     */
    public function itCanSetOffset()
    {
        $item = new CartItem();
        $item->offsetSet(1, ['price' => 50]);

        var_dump($item->offsetGet(1));
    }
    


    public function dataProvider()
    {
        return [
            'id' => '1',
            ''
        ];
    }
}
