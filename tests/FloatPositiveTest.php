<?php

declare(strict_types=1);

test('floatPositive() method returns a float value', function (): void {
    $value = 🙃()->number->floatPositive();

    expect($value)->toBeFloat();
});

test('floatPositive() method returns a positive float', function (): void {
    $value = 🙃()->number->floatPositive();

    expect($value)->toBeGreaterThanOrEqual(0);
});

test('floatPositive() method returns zero if $max=0', function (): void {
    $value = 🙃()->number->floatPositive(0);

    expect($value)->toBe(0.0);
});

test('floatPositive() method returns a float with given $precision', function (): void {
    $precision = random_int(0, 14);
    $value = 🙃()->number->floatPositive(1, $precision);

    expect($precision)->toBeLessThanOrEqual(strlen((string) $value));
});
