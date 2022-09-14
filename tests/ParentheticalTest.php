<?php

namespace Tests;

use App\Modules\Parenthetical;
use PHPUnit\Framework\TestCase;

class ParentheticalTest extends TestCase
{
    /**
     * @param string $sentence
     * @param bool $expected
     * @return void
     * @dataProvider sentencesProvider
     */
    public function testSentenceIsBalanced(string $sentence, bool $expected) : void
    {
        $this->assertSame(
            Parenthetical::isBalanced($sentence),
            $expected
        );
    }

    /**
     * @return array[]
     */
    public function sentencesProvider()
    {
        return [
                ['mary (had a [little] lamb)', true],
                ['mary (had a [little] lamb]', false]
        ];
    }
}