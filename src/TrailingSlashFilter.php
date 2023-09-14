<?php

declare(strict_types=1);

/**
 * @package    src
 * @subpackage
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 */

namespace Zalt\Filter;

/**
 * @package    src
 * @subpackage
 * @since      Class available since version 1.0
 */
class TrailingSlashFilter implements \Laminas\Filter\FilterInterface
{
    /**
     * @inheritDoc
     */
    public function filter($value)
    {
        $values = explode(' ', $value);

        foreach ($values as &$val) {
            if (substr($val, -1) === '/') {
                $val = substr($val, 0, -1);
            }
        }

        return implode(' ', $values);
    }
}