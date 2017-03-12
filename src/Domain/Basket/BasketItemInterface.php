<?php

namespace Mps\Domain\Basket;

use Mps\Domain\Basket;

interface BasketItemInterface
{
    public function getId();

    public function getQuantity();

    public function getTotalPrice();

    public function add($element);

    public function toArray();
}
