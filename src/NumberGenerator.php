<?php

declare(strict_types=1);

namespace Phonyland\NumberGenerator;

use Exception;
use Phonyland\GeneratorManager\Generator;

class NumberGenerator extends Generator
{
    // region Integers

    /**
     * Generates a random integer between $min and $max.
     *
     * @param  int  $min
     * @param  int  $max
     *
     * @return int
     */
    public function integerBetween(int $min = -10000, int $max = +10000): int
    {
        try {
            return random_int($min, $max);
        } catch (Exception) {
            return mt_rand($min, $max);
        }
    }

    /**
     * Generates a random integer between $min and $max without boundaries.
     *
     * @param  int  $min
     * @param  int  $max
     *
     * @return int
     */
    public function integerWithin(int $min = -10000, int $max = +10000): int
    {
        return $this->integerBetween($min + 1, $max - 1);
    }

    /**
     * Generates a random positive integer between 1 and $max.
     *
     * @param  int  $max
     *
     * @return int
     */
    public function integerPositive(int $max = 10000): int
    {
        return $this->integerBetween(1, $max);
    }

    /**
     * Generates a random negative integer between $min and -1.
     *
     * @param  int  $min
     *
     * @return int
     */
    public function integerNegative(int $min = -10000): int
    {
        return $this->integerBetween($min, -1);
    }

    /**
     * Generates a random integer with a number of $digits.
     *
     * @param  int|null   $digits  Defaults to a random digit not null
     * @param  bool       $strict  Whether the returned number should have exactly $nbDigits
     * @param  bool|null  $isPositive
     *
     * @return int
     */
    public function integer(int $digits = null, bool $strict = false, bool $isPositive = null): int
    {
        if ($digits === null) {
            $digits = $this->digitNonZero();
        }

        $max = (10 ** $digits) - 1;

        $min = $strict
            ? 10 ** ($digits - 1)
            : 0;

        if (! isset($isPositive)) {
            $isPositive = $this->phony->boolean->boolean;
        }

        $isPositive = $isPositive ? 1 : -1;

        return $isPositive * $this->integerBetween($min, $max);
    }

    /**
     * Generates a random integer with leading zeros.
     *
     * @param  int  $digits
     *
     * @return string
     */
    public function integerLeadingZero(int $digits = 10): string
    {
        $value = (string) $this->integer(null, false, true);

        return str_pad($value, $digits, '0', STR_PAD_LEFT);
    }

    /**
     * Generates a random integer in a standard deviation.
     *
     * @param  int  $mean
     * @param  int  $standardDeviation
     *
     * @return int
     */
    public function integerWeighted(int $mean = 10000, int $standardDeviation = 1000): int
    {
        return (int) $this->floatNormal($mean, $standardDeviation);
    }

    // endregion

    // region Digits

    /**
     * Generates a random digit for the given base.
     *
     * @param  int  $base
     *
     * @return int
     */
    public function digit(int $base = 10): int
    {
        return $this->integerBetween(0, $base - 1);
    }

    /**
     * Generates a random digit for the given base except the given digit.
     *
     * @param  int  $except
     * @param  int  $base
     *
     * @return int
     */
    public function digitExcept(int $except = 0, int $base = 10): int
    {
        return $this->integerExcept($except, 0, $base - 1);
    }

    // endregion
}
