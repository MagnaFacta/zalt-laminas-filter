<?php

declare(strict_types=1);

/**
 * @package    Zalt
 * @subpackage Filter\Dutch
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 */

namespace Zalt\Filter\Dutch;

use Laminas\Filter\AbstractFilter;

/**
 * @package    Zalt
 * @subpackage Filter\Dutch
 * @since      Class available since version 1.0
 */
class BurgerservicenummerFilter extends AbstractFilter
{
    /**
     * @inheritDoc
     */
    public function filter($value)
    {
        $digitsFilter = new Digits();
        $newValue = $digitsFilter->filter($value);

        if (intval($newValue)) {
            return (string) str_pad($newValue, 9, '0', STR_PAD_LEFT);
        }

        // Return as is when e.g. ********* or nothing
        return (string) $value;
    }
}