<?php declare(strict_types = 1);

namespace Mps\Domain\Money;

/**
 * Class Currency
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class Currency
{
    /**
     * @var string
     */
    private $isoCode;

    /**
     * @param string $isoCode
     */
    public function __construct($isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    /**
     * @param string $isoCode
     */
    private function setIsoCode($isoCode)
    {
        if (!preg_match('/^[A-Z]{3}$/', $isoCode)) {
            throw new \InvalidArgumentException();
        }
        $this->isoCode = $isoCode;
    }

    public function isoCode()
    {
        return $this->isoCode;
    }
}
