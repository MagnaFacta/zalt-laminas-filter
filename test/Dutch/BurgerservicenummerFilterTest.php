<?php

declare(strict_types=1);

/**
 * @package    test
 * @subpackage Dutch
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 */

namespace test\Dutch;

use Zalt\Filter\Dutch\BurgerservicenummerFilter;

/**
 * @package    test
 * @subpackage Dutch
 * @since      Class available since version 1.0
 */
class BurgerservicenummerFilterTest extends \PHPUnit\Framework\TestCase
{
    public static function provideFilters()
    {
        return [
            'normal' => ['123456789', '123456789'],
            'padzero' => ['1', '000000001'],
            'space' => [' 12', '000000012'],
            'spaceX' => [' X123', '000000123'],
            'stars' => ['*********', '*********'],
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
    public function testFilter($input, $output)
    {
        $filter = new BurgerservicenummerFilter();
        $this->assertEquals($output, $filter->filter($input));
    }
}