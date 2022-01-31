<?php

declare(strict_types=1);

test('floatBetween() method returns a float value', function () {
    $value = 🙃()->number->floatBetween();

    expect($value)->toBeFloat();
});

test('floatBetween() method returns a float between $min and $max', function () {
    $value = 🙃()->number->floatBetween(0.0, 1.0);

    expect($value)->toBeGreaterThanOrEqual(0);
    expect($value)->toBeLessThanOrEqual(1);
});

test('floatBetween() method returns a float with given $precision', function () {
    $precision = random_int(0, 14);
    $value = 🙃()->number->floatBetween(0.0, 1.0, $precision);

    expect(strlen($value))->toBeLessThanOrEqual($precision + 2);
});
