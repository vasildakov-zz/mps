<?php declare(strict_types = 1);

namespace MpsTest\Domain\Basket;

use Mps\Domain\Product\Product;
use Mps\Domain\Product\ProductInterface;
use Mps\Domain\Basket\Basket;
use Mps\Domain\Basket\BasketInterface;

/**
 * CartTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class BasketTest extends \PHPUnit\Framework\TestCase
{
    protected $strawberries;
    protected $biscuits;
    protected $bread;
    protected $bananas;

    protected function setUp()
    {
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
        $basket = new Basket(1);

        self::assertInstanceOf(BasketInterface::class, $basket);
    }

    /**
     * @test
     */
    public function itCanAddMultipleProducts()
    {
        $basket = new Basket(1);

        $basket->add($this->strawberries);
        $basket->add($this->biscuits);

        self::assertEquals(2, count($basket->getItems()));
    }

    /**
     * @test
     */
    public function itHasOneRowPerProduct()
    {
        $basket = new Basket(1);

        $basket->add($this->strawberries);
        $basket->add($this->biscuits);
        $basket->add($this->strawberries);
        $basket->add($this->biscuits);

        self::assertEquals(2, count($basket->getItems()));
    }

    /**
     * @test
     */
    public function itCanCalculateTotalWithNoOffers()
    {
        $basket = new Basket(1);

        $basket->add($this->strawberries);
        $basket->add($this->biscuits);
        $basket->add($this->bread);
        $basket->add($this->bananas);

        self::assertEquals(115, $basket->total());
    }


    /**
     * @test
     */
    public function itCanCalculateTotalWithOffers()
    {
        $basket = new Basket(4);

        // 6
        $basket->add($this->strawberries);
        $basket->add($this->strawberries);
        $basket->add($this->strawberries);
        $basket->add($this->strawberries);
        $basket->add($this->strawberries);
        $basket->add($this->strawberries);

        // 5
        $basket->add($this->biscuits);
        $basket->add($this->biscuits);
        $basket->add($this->biscuits);
        $basket->add($this->biscuits);
        $basket->add($this->biscuits);

        // 3
        $basket->add($this->bread);
        $basket->add($this->bread);
        $basket->add($this->bread);

        // 2
        $basket->add($this->bananas);
        $basket->add($this->bananas);

        self::assertEquals(470, $basket->total());
    }


    /**
     * @test
     */
    public function itCanExportToArray()
    {
        $basket = new Basket(1);

        self::assertInternalType('array', $basket->toArray());
    }
}
