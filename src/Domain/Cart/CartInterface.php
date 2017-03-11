<?php

namespace Mps\Domain\Cart;

interface CartInterface
{
    public function add(CartItem $item);

    public function remove($itemId);

    public function has($itemId);

    public function total();
}
