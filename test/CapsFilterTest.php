<?php

declare(strict_types=1);

/**
 * @package    test
 * @subpackage
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 */

namespace test;

use Zalt\Filter\RequireOneCapsFilter;
use Zalt\Filter\UcFirstFilter;

/**
 * @package    test
 * @subpackage
 * @since      Class available since version 1.0
 */
class CapsFilterTest extends \PHPUnit\Framework\TestCase
{
    public static function provideFilters()
    {
        return [
            'normal' => ['Abcde', 'Abcde', 'Abcde'],
            'lcase' => ['abcde', 'Abcde', 'Abcde'],
            'mcase' => ['aBcde', 'ABcde', 'aBcde'],
            'ucase' => ['ABCDE', 'ABCDE', 'ABCDE'],
            '1lcase' => ['aBCDE', 'ABCDE', 'aBCDE'],
            'null' => [null, null, null],
            'empty' => ['', '', ''],
        ];
    }

    /**
     * @dataProvider provideFilters
     * @param $input
     * #param $alt
     * @param $output
     * @return void
     */
    public function testRequireOneCaps($input, $alt, $output)
    {
        $filter = new RequireOneCapsFilter();
        $this->assertEquals($output, $filter->filter($input));
    }

    /**
     * @dataProvider provideFilters
     * @param $input
     * @param $output
     * #param $alt
     * @return void
     */
    public function testUcFirst($input, $output, $alt)
    {
        $filter = new UcFirstFilter();
        $this->assertEquals($output, $filter->filter($input));
    }
}