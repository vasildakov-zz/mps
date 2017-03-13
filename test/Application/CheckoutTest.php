<?php declare(strict_types = 1);

namespace MpsTest\Application;

use Mps\Domain\Basket\Basket;
use Mps\Domain\Product\Product;

use Mps\Application\Checkout;
use Mps\Application\CheckoutInterface;

/**
 * CheckoutTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CheckoutTest extends \PHPUnit\Framework\TestCase
{
    protected $basket;
    protected $strawberries;
    protected $biscuits;
    protected $bread;
    protected $bananas;

    protected function setUp()
    {
        $this->basket       = new Basket('1');
        $this->strawberries = new Product('1', 'Strawberries', 50);
        $this->biscuits     = new Product('2', 'Biscuits', 30);
        $this->bread        = new Product('3', 'Bread', 20);
        $this->bananas      = new Product('4', 'Bananas', 15);
    }

    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $checkout = new Checkout($this->basket);

        self::assertInstanceOf(CheckoutInterface::class, $checkout);
    }

    /**
     * @test
     */
    public function itCanScanProducts()
    {
        $checkout = new Checkout($this->basket);

        self::assertNull($checkout->scan($this->bread));
    }


    /**
     * @test
     */
    public function itCanCalculateTotal1()
    {
        $checkout = new Checkout($this->basket);

        $checkout->scan($this->strawberries);
        $checkout->scan($this->biscuits);
        $checkout->scan($this->bread);
        $checkout->scan($this->bananas);

        self::assertEquals(115, $checkout->total());
    }

    /**
     * @test
     */
    public function itCanCalculateTotal2()
    {
        $checkout = new Checkout($this->basket);

        // 2
        $checkout->scan($this->strawberries);
        $checkout->scan($this->strawberries);

        // 1
        $checkout->scan($this->biscuits);

        // 3
        $checkout->scan($this->bread);
        $checkout->scan($this->bread);
        $checkout->scan($this->bread);

        // 4
        $checkout->scan($this->bananas);
        $checkout->scan($this->bananas);
        $checkout->scan($this->bananas);
        $checkout->scan($this->bananas);

        self::assertEquals(250, $checkout->total());
    }

    /**
     * @test
     */
    public function itCanCalculateTotal3()
    {
        $checkout = new Checkout($this->basket);

        // 3
        $checkout->scan($this->strawberries);
        $checkout->scan($this->strawberries);
        $checkout->scan($this->strawberries);

        // 2
        $checkout->scan($this->biscuits);
        $checkout->scan($this->biscuits);

        // 2
        $checkout->scan($this->bread);
        $checkout->scan($this->bread);

        // 2
        $checkout->scan($this->bananas);
        $checkout->scan($this->bananas);

        self::assertEquals(245, $checkout->total());
    }

    /**
     * @test
     */
    public function itCanCalculateTotal4()
    {
        $checkout = new Checkout($this->basket);

        // 6
        $checkout->scan($this->strawberries);
        $checkout->scan($this->strawberries);
        $checkout->scan($this->strawberries);
        $checkout->scan($this->strawberries);
        $checkout->scan($this->strawberries);
        $checkout->scan($this->strawberries);

        // 5
        $checkout->scan($this->biscuits);
        $checkout->scan($this->biscuits);
        $checkout->scan($this->biscuits);
        $checkout->scan($this->biscuits);
        $checkout->scan($this->biscuits);

        // 3
        $checkout->scan($this->bread);
        $checkout->scan($this->bread);
        $checkout->scan($this->bread);

        // 2
        $checkout->scan($this->bananas);
        $checkout->scan($this->bananas);

        self::assertEquals(470, $checkout->total());
    }



    protected function tearDown()
    {
        $this->basket->clear();
    }
}
