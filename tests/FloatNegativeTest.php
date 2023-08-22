<?php

declare(strict_types=1);

test('floatNegative() method returns a float value', function (): void {
    $value = 🙃()->number->floatNegative();

    expect($value)->toBeFloat();
});

test('floatNegative() method returns a negative float', function (): void {
    $value = 🙃()->number->floatNegative();

    expect($value)->toBeLessThan(0);
});

test('floatNegative() method returns a float with given $precision', function (): void {
    $precision = random_int(0, 14);
    $value = 🙃()->number->floatNegative(-1, $precision);

    expect(strlen((string) $value))->toBeLessThanOrEqual($precision + 3);
});
