<?php

namespace Mps\Domain\Product;

/**
 * Class ProductName
 *
 * @author  Vasil Dakov <vasildakov@gmail.com>
 */
class ProductName
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @param string $name
     */
    private function setName($name)
    {
        $this->assertNotEmpty($name);
        return $this->name = $name;
    }

    /**
     * @param  string $name
     * @return bool
     * @throws InvalidArgumentException
     */
    private function assertNotEmpty($name)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('Empty name');
        }
        return true;
    }
}
