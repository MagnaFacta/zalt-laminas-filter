<?php

declare(strict_types=1);

/**
 * @package    test
 * @subpackage
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 */

namespace test;

use PHPUnit\Framework\TestCase;
use Zalt\Filter\CleanEmailFilter;

/**
 * @package    test
 * @subpackage
 * @since      Class available since version 1.0
 */
class CleanEmailFilterTest extends TestCase
{
    public static function provideFilters()
    {
        return [
            'normal' => ['test@test.mail', 'test@test.mail'],
            'mailto' => ['mailto:test@test.mail', 'test@test.mail'],
            'space' => [' test @t est. mail ', 'test@test.mail'],
            'withName' => ['test test <test@test.mail>', 'test@test.mail'],
            'all' => ['mailto:test test <mailto:test@test.mail > ', 'test@test.mail'],
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
        $filter = new CleanEmailFilter();
        $this->assertEquals($output, $filter->filter($input));
    }
}