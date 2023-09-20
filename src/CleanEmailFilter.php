<?php

declare(strict_types=1);

/**
 * @package    Zalt
 * @subpackage Filter
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 */

namespace Zalt\Filter;

/**
 * @package    Zalt
 * @subpackage Filter
 * @since      Class available since version 1.0
 */
class CleanEmailFilter implements \Laminas\Filter\FilterInterface
{
    /**
     * @inheritDoc
     */
    public function filter($value)
    {
        if ($value === null) {
            return $value;
        }
        // Remove mailto: from copy & paste
        $value = str_ireplace('mailto:', '', $value);

        // Remove all whitespace characters
        $value = preg_replace('/\s+/', '', $value);

        // Return substring between two lookup values
        $startsearch = '<';
        $endsearch = '>';

        $startpos = stripos($value, $startsearch);
        if (false !== $startpos) {
            $endpos = stripos($value, $endsearch, $startpos);

            if ($endpos) {
                $value = trim(substr($value, $startpos + strlen($startsearch), $endpos - $startpos - strlen($startsearch)));
            }
        }

        return $value;
    }
}