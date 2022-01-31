<?php

declare(strict_types=1);

namespace Phonyland\NumberGenerator;

use Exception;
use Phonyland\GeneratorManager\Generator;
use RangeException;

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

    /**
     * Generates a random integer except the given integer or array.
     *
     * @param  int|array  $except
     * @param  int        $min
     * @param  int        $max
     *
     * @return int
     */
    public function integerExcept(int|array $except = 666, int $min = -10000, int $max = +10000): int
    {
        if (is_int($except)) {
            $except = [$except];
        }

        if (count($except) >= ($max - $min + 1)) {
            throw new RangeException(sprintf(
                'There are not enough integers for this range. Between %s to %s, except %s',
                $min,
                $max,
                implode(', ', $except)
            ));
        }

        do {
            $value = $this->integerBetween($min, $max);
        } while (in_array($value, $except, true));

        return $value;
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

    /**
     * Generates a random digit for the given base but not 0.
     *
     * @param  int  $base
     *
     * @return int
     */
    public function digitNonZero(int $base = 10): int
    {
        return $this->digitExcept(0, $base);
    }

    // endregion

    // region Floats

    /**
     * Generates a random float between $min and $max.
     *
     * @param  float  $min
     * @param  float  $max
     * @param  int  $precision
     *
     * @return float
     */
    public function floatBetween(float $min = 0, float $max = 1, int $precision = 14): float
    {
        return (float) round(lcg_value() * ($max - $min) + $min, $precision);
    }

    /**
     * Generates a random positive float between 1 and $max.
     *
     * @param  int  $max
     * @param  int  $precision
     *
     * @return float
     */
    public function floatPositive(int $max = 10000, int $precision = 14): float
    {
        return $this->floatBetween(0, $max, $precision);
    }

    /**
     * Generates a random negative float between $min and -1.
     *
     * @param  int  $min
     * @param  int  $precision
     *
     * @return float
     */
    public function floatNegative(int $min = -10000, int $precision = 14): float
    {
        return $this->floatBetween($min, 0, $precision);
    }

    /**
     * Generates a random float number between $min, $max and
     *  with a given number of maximum decimals.
     *
     * @param  int|null  $leftDigits  Defaults to a random digit not null
     * @param  int|null  $rightDigits  Maximum number of decimals
     * @param  bool  $strict  Whether the returned number should have exactly $nbDigits
     *
     * @return float
     */
    public function float(int $leftDigits = null, int $rightDigits = null, bool $strict = false): float
    {
        if ($leftDigits === null) {
            $leftDigits = $this->digitNonZero();
        }

        if ($rightDigits === null) {
            $rightDigits = $this->digit();
        }

        $max = (10 ** $leftDigits) - 1;

        $min = $strict
            ? 10 ** ($leftDigits - 1)
            : 0;

        return $this->floatBetween($min, $max, $rightDigits);
    }

    // endregion
}
