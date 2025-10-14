<?php

declare(strict_types=1);

namespace Zalt\Filter;

use function is_float;

use function is_int;
use function is_string;
use function preg_replace;
use Laminas\Filter\AbstractFilter;
use Laminas\Stdlib\StringUtils;

/**
 * @psalm-type Options = array{}
 * @extends AbstractFilter<Options>
 * @final
 */
class Integer extends AbstractFilter
{
    /**
     * Defined by Laminas\Filter\FilterInterface
     *
     * Returns the string $value, removing all but digit characters and an optional leading minus sign
     *
     * If the value provided is not integer, float or string, the value will remain unfiltered
     *
     * @param  mixed $value
     * @return string|mixed
     * @psalm-return ($value is int|float|string ? numeric-string : mixed)
     */
    public function filter($value)
    {
        if (is_int($value)) {
            return (string) $value;
        }
        if (! is_float($value) && ! is_string($value)) {
            return $value;
        }
        $value = (string) $value;

        if (! StringUtils::hasPcreUnicodeSupport()) {
            // POSIX named classes are not supported, use alternative 0-9 match
            $pattern = '/[^0-9-]/';
        } else {
            $pattern = '/[^[:digit:]-]/';
        }

        $minusPattern = '/(?!^)-/'; // Match - not at start of string

        return preg_replace($minusPattern, '', preg_replace($pattern, '', $value));
    }
}
