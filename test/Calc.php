<?php declare(strict_types = 1);

namespace MpsTest;

/**
 * CalcTest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CalcTest extends \PHPUnit\Framework\TestCase
{
    public function testItCanCalculate()
    {
        $total = 0;

        $offer = [
            'quantity' => 3,
            'price'    => 130
        ];

        $items = [
            ['name' => 'Strawberries', 'price' => 50],
            ['name' => 'Strawberries', 'price' => 50],
            ['name' => 'Strawberries', 'price' => 50],
            ['name' => 'Strawberries', 'price' => 50],
            ['name' => 'Strawberries', 'price' => 50],
            ['name' => 'Strawberries', 'price' => 50],
            ['name' => 'Strawberries', 'price' => 50],
        ];

        $chunked = array_chunk($items, $offer['quantity']);

        foreach ($chunked as $array) {
            if ($offer['quantity'] == count($array)) {
                $total += $offer['price'];
            } else {
                $total += 50;
            }
        }

        var_dump($total);

    }
}
