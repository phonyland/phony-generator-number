<?php

declare(strict_types=1);

namespace Phonyland\NumberGenerator;

use Phonyland\GeneratorManager\Generator;

class NumberGenerator extends Generator
{
    /**
     * @throws \Exception
     */
    public function text(): string
    {
        return 'number-text-'.random_int(1, 9999);
    }
}
