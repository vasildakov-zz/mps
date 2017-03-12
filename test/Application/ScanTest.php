<?php declare(strict_types = 1);

namespace MpsTest\Application;

use Mps\Domain\Basket\BasketInterface;
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
    protected $basket;

    protected $product;

    protected function setUp()
    {
        $this->basket = $this->getMockForAbstractClass(BasketInterface::class);

        $this->product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $scan = new Scan($this->basket);

        self::assertInstanceOf(ScanInterface::class, $scan);
    }

    /**
     * @test
     */
    public function itCanScanProducts()
    {
        $scan = new Scan($this->basket);

        self::assertTrue($scan($this->product));
    }
}
