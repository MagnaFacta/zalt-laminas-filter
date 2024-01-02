<?php

declare(strict_types=1);

namespace Zalt\Filter;

use PHPUnit\Framework\TestCase;

class NegativeDigitsTest extends TestCase
{
    public static function correctPositiveNumbersProvider(): array
    {
        return [
            [123, '123'],
            ['234', '234'],
            [123.45, '12345'],
            ['345.45', '34545'],
        ];
    }

    public static function correctNegativeNumbersProvider(): array
    {
        return [
            [-123, '-123'],
            ['-234', '-234'],
            [-123.45, '-12345'],
            ['-345.45', '-34545'],
        ];
    }

    public static function incorrectNumbersProvider(): array
    {
        return [
            ['1s2d3', '123'],
            ['-2a3b4', '-234'],
            ['1a2b3c.d4e5f', '12345'],
            ['-a3a4b5.45', '-34545'],
            ['0-abc1', '01'],
            ['----abde12', '-12'],
            ['--23', '-23']
        ];
    }

    /**
     * @test
     * @dataProvider correctPositiveNumbersProvider
     * @dataProvider correctNegativeNumbersProvider
     * @dataProvider incorrectNumbersProvider
     */
    public function numbersAreCorrectlyFiltered(float|int|string $input, string $expectedFilteredOutput): void
    {
        $negativeDigitsFilter = new NegativeDigits();

        $actualFilteredOutput = $negativeDigitsFilter->filter($input);

        $this->assertSame($expectedFilteredOutput, $actualFilteredOutput,);
    }
}