<?php

namespace Tests;

use App\Modules\NestedArrayHelper;
use PHPUnit\Framework\TestCase;

class NestedArrayTest extends TestCase
{
    /**
     * @return void
     */
    public function testNestedProduction() : void
    {
        $this->assertSame(
            NestedArrayHelper::product(
                [1, 2, [10, [100, 200], 20, 30], 3, [40, 50]],
                2
            ),
            [2, 4, [20, [200, 400], 40, 60], 6, [80, 100]]
        );
    }
}