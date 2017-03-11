<?php declare(strict_types = 1);

namespace MpsTest\Domain\Product;

use Mps\Domain\Product\ProductName;

/**
 * ProductNameTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class ProductNameTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $name = new ProductName('Strawberries');

        self::assertInstanceOf(ProductName::class, $name);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function itThrowsAnExceptionForInvalidName()
    {
        $name = new ProductName('');
    }
}
