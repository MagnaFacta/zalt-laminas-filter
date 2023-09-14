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
class PostcodeFilter implements \Laminas\Filter\FilterInterface
{
    /**
     * @inheritDoc
     */
    public function filter($value)
    {
        if ($value === null) {
            return null;
        }
        // perform some transformation upon $value to get $valueFiltered
        $valueFiltered = strtoupper(trim($value));
        if (strlen($valueFiltered) == 6) {
            if (preg_match('/\d{4,4}[A-Z]{2,2}/', $valueFiltered)) {
                $valueFiltered = substr_replace($valueFiltered, ' ', 4, 0);
            }
        }

        return $valueFiltered;
    }
}