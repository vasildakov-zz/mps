<?php declare(strict_types = 1);

namespace MpsTest\Domain\Cart;

use Mps\Domain\Cart\CartId;
use Mps\Domain\Cart\CartIdInterface;

/**
 * CartIdTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CartIdTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $id = new CartId('87dc0a5c-e98b-48e8-a124-3603929eca91');

        self::assertInstanceOf(CartIdInterface::class, $id);
    }

    /**
     * @test
     */
    public function isEqualToTheSameObject()
    {
        $id = new CartId('87dc0a5c-e98b-48e8-a124-3603929eca91');

        $other = new CartId('87dc0a5c-e98b-48e8-a124-3603929eca91');
        
        self::assertTrue($id->equalsTo($other));
    }
}
