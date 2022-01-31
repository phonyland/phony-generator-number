<?php

declare(strict_types=1);

test('digit() method returns an integer value', function () {
    $value = 🙃()->number->digit();

    expect($value)->toBeInt();
});

test('digit() method returns a digit', function () {
    $value = 🙃()->number->digit();

    expect($value)->toBeGreaterThanOrEqual(0);
    expect($value)->toBeLessThanOrEqual(9);
});

test('digit() method returns a digit for the given $base', function () {
    $valueBase2 = 🙃()->number->digit(2);

    expect($valueBase2)->toBeGreaterThanOrEqual(0);
    expect($valueBase2)->toBeLessThanOrEqual(2);

    $base = random_int(2, 99);
    $value = 🙃()->number->digit($base);

    expect($value)->toBeGreaterThanOrEqual(0);
    expect($value)->toBeLessThanOrEqual($base);
});
