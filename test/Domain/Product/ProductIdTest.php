<?php declare(strict_types = 1);

namespace MpsTest\Domain\Product;

use Mps\Domain\Product\ProductId;
use Mps\Domain\Product\ProductIdInterface;

/**
 * ProductIdTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class ProductIdTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $id = new ProductId('87dc0a5c-e98b-48e8-a124-3603929eca91');

        self::assertInstanceOf(ProductIdInterface::class, $id);
    }

    /**
     * @test
     */
    public function isEqualToTheAnotherObject()
    {
        $id    = new ProductId('87dc0a5c-e98b-48e8-a124-3603929eca91');

        $other = new ProductId('87dc0a5c-e98b-48e8-a124-3603929eca91');
        
        self::assertTrue($id->equalsTo($other));
    }

    /**
     * @test
     */
    public function isNotEqualToTheAnotherObject()
    {
        $id    = new ProductId('87dc0a5c-e98b-48e8-a124-3603929eca91');

        $other = new ProductId('0ec44302-7b06-4709-a106-8f592b7a600b');
        
        self::assertFalse($id->equalsTo($other));
    }
}
