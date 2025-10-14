<?php

declare(strict_types=1);

/**
 * @package    test
 * @subpackage
 */

namespace test;

use Zalt\Filter\Integer;

/**
 * @package    test
 * @subpackage
 * @since      Class available since version 1.0.2
 */
class IntegerTest extends \PHPUnit\Framework\TestCase
{
    public static function provideFilters()
    {
        return [
            'positive' => ['123', '123'],
            'negative' => ['-123', '-123'],
            'positive with text' => ['123abc', '123'],
            'negative with text' => ['-123abc', '-123'],
            'text with positive' => ['abc123', '123'],
            'text with negative' => ['abc-123', '-123'],
            'text with negative in middle' => ['abc-123-456', '-123456'],
            'text with positive in middle' => ['abc123-456', '123456'],
            'floatstring' => ['123.456', '123'],
            'negative floatstring' => ['-123.456', '-123'],
            'floatstring with e' => ['123.456e7', '123'], // Exponent notation not supported for strings
            'negative floatstring with e' => ['-123.456e7', '-123'], // Exponent notation not supported for strings
            'int' => [123, '123'],
            'negative int' => [-123, '-123'],
            'float' => [123.456, '123'],
            'negative float' => [-123.456, '-123'],
            'float with e' => [123.456e7, '1234560000'],
            'float with negative e' => [123.456e-7, '0'],
            'null' => [null, null],
            'empty' => ['', ''],
        ];
    }

    /**
     * @dataProvider provideFilters
     * @param $input
     * @param $output
     * @return void
     */
    public function testIntegerFilter($input, $output)
    {
        $filter = new Integer();
        $this->assertEquals($output, $filter->filter($input));
    }
}
