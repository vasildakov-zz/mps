<?php declare(strict_types = 1);

namespace MpsTest\Application;

use Mps\Domain\Cart\CartInterface;
use Mps\Domain\Product\ProductInterface;
use Mps\Domain\Product\Product;

use Mps\Application\Scan;
use Mps\Application\ScanInterface;

/**
 * ScanTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class ScanTest extends \PHPUnit\Framework\TestCase
{
    protected $cart;

    protected $product;

    protected function setUp()
    {
        $this->cart = $this->getMockForAbstractClass(CartInterface::class);

        $this->product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $scan = new Scan($this->cart);

        self::assertInstanceOf(ScanInterface::class, $scan);
    }

    /**
     * @test
     */
    public function itCanScanProducts()
    {
        $array = [];

        $this->product
             ->expects(self::once())
             ->method('toArray')
             ->will(self::returnValue($array))
        ;

        $scan = new Scan($this->cart);

        self::assertTrue($scan($this->product));
    }
}
