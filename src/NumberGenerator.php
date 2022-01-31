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
}
