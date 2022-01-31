<?php

declare(strict_types=1);

test('boolean() method returns a boolean value')
    ->expect(🙃()->number->boolean())
    ->toBeBool();

test('boolean() method with $truePercentage=100 returns always true')
    ->expect(🙃()->number->boolean(100))
    ->toBeTrue();