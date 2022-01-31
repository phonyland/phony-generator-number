<?php

declare(strict_types=1);

namespace Phonyland\NumberGenerator;

use Exception;
use Phonyland\GeneratorManager\Generator;

class NumberGenerator extends Generator
{
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
}
