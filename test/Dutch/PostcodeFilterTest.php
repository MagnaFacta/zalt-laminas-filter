<?php

declare(strict_types=1);

/**
 * @package    test
 * @subpackage Dutch
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 */

namespace test\Dutch;

use Zalt\Filter\Dutch\PostcodeFilter;

/**
 * @package    test
 * @subpackage Dutch
 * @since      Class available since version 1.0
 */
class PostcodeFilterTest extends \PHPUnit\Framework\TestCase
{
    public static function provideFilters()
    {
        return [
            'normal' => ['3063 CC', '3063 CC'],
            'space' => ['3063CC', '3063 CC'],
            'uk' => ['CCS366', 'CCS366'],
            'de' => ['12345', '12345'],
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
        $filter = new PostcodeFilter();
        $this->assertEquals($output, $filter->filter($input));
    }
}