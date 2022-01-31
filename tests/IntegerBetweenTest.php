<?php

declare(strict_types=1);

test('integerBetween() method returns an integer value')
    ->expect(🙃()->number->integerBetween())
    ->toBeInt();

test('integerBetween() method returns an integer between $min and $max')
    ->expect(🙃()->number->integerBetween(1, 100))
    ->toBeGreaterThanOrEqual(1)
    ->toBeLessThanOrEqual(100);

test('integerBetween() method returns error if $min > $max', function () {
    🙃()->number->integerBetween(2, 1);
})->throws(Error::class);
