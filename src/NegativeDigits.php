<?php

declare(strict_types=1);

namespace Zalt\Filter;

use Laminas\Filter\Digits;

class NegativeDigits extends Digits
{
    public function filter($value)
    {
        $filteredValue = parent::filter($value);

        if (!is_int($value) && str_starts_with((string) $value, '-')) {
            return '-' . $filteredValue;
        }

        return $filteredValue;
    }
}