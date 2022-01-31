<?php

declare(strict_types=1);

test('floatPositive() method returns a float value', function () {
    $value = 🙃()->number->floatPositive();

    expect($value)->toBeFloat();
});

test('floatPositive() method returns a positive float', function () {
    $value = 🙃()->number->floatPositive();

    expect($value)->toBeGreaterThanOrEqual(0);
});

test('floatPositive() method returns zero if $max=0', function () {
    $value = 🙃()->number->floatPositive(0);

    expect($value)->toBe(0.0);
});
