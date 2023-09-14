<?php

declare(strict_types=1);

/**
 * @package    Zalt
 * @subpackage Filter\Dutch
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 */

namespace Zalt\Filter\Dutch;

/**
 * @package    Zalt
 * @subpackage Filter\Dutch
 * @since      Class available since version 1.0
 */
class BurgerservicenummerFilter extends \Laminas\Filter\Digits
{
    /**
     * @inheritDoc
     */
    public function filter($value)
    {
        $newValue = parent::filter($value);

        if (intval($newValue)) {
            return str_pad($newValue, 9, '0', STR_PAD_LEFT);
        }

        // Return as is when e.g. ********* or nothing
        return $value;
    }
}