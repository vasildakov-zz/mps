<?php declare(strict_types = 1);

namespace MpsTest\Domain\Money;

use Mps\Domain\Money\Currency;

/**
 * CurrencyTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CurrencyTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function itCanBeConstructed()
    {
        $currency = new Currency('GBP');

        self::assertInstanceOf(Currency::class, $currency);

        self::assertEquals('GBP', $currency->isoCode());
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function itThrowsAnExceptionForInvalidIsoCode()
    {
        $currency = new Currency('XYZB');
    }
}
