<?php

declare(strict_types=1);

namespace Zalt\Filter;

use Laminas\Filter\Digits;

class NegativeDigits extends Digits
{
    public function filter($value)
    {
        $isNegative = str_starts_with('-', $value);

        $filteredValue = parent::filter($value);

        if ($isNegative) {
            return '-' . $filteredValue;
        }

        return $filteredValue;
    }
}