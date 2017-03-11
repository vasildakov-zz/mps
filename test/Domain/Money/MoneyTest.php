<?php declare(strict_types = 1);

namespace MpsTest\Domain\Money;

use Mps\Domain\Money\Money;
use Mps\Domain\Money\Currency;

/**
 * MoneyTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class MoneyTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $money = new Money(100, new Currency('GBP'));

        self::assertInstanceOf(Money::class, $money);

        self::assertInstanceOf(Currency::class, $money->currency());

        self::assertEquals(100, $money->amount());
    }
}
