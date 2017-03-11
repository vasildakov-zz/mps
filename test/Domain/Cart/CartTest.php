<?php declare(strict_types = 1);

namespace MpsTest\Domain\Cart;

use Mps\Domain\Cart\Cart;
use Mps\Domain\Cart\CartItem;
use Mps\Domain\Cart\CartInterface;
use Mps\Domain\Cart\CartIdInterface;
use Mps\Domain\Storage\StorageInterface;

/**
 * CartTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CartTest extends \PHPUnit\Framework\TestCase
{
    protected $id;

    protected $storage;

    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|CartIdInterface $id */
        $this->id = $this->getMockForAbstractClass(CartIdInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|ContainerInterface $storage */
        $this->storage = $this->getMockForAbstractClass(StorageInterface::class);
    }

    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $cart = new Cart($this->id, $this->storage);

        self::assertInstanceOf(CartInterface::class, $cart);
    }


    /**
     * @test
     */
    public function itCanAddItems()
    {
        $cart = new Cart($this->id, $this->storage);

        $cart->add(new CartItem());
    }


    /**
     * @test
     */
    public function itReturnZeroTotal()
    {
        $cart = new Cart($this->id, $this->storage);

        self::assertEquals(0, $cart->total());
    }


    /**
     * @test
     */
    public function itCanExportToArray()
    {
        $cart = new Cart($this->id, $this->storage);

        self::assertInternalType('array', $cart->toArray());
    }

}
