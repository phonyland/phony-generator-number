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
