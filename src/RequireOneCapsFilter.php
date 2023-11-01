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
class RequireOneCapsFilter implements \Laminas\Filter\FilterInterface
{
    /**
     * @inheritDoc
     */
    public function filter($value)
    {
        if (is_string($value) && ($value === strtolower($value))) {
            return ucfirst($value);
        }

        return $value;
    }
}