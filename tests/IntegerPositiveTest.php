<?php

declare(strict_types=1);

test('integerPositive() method returns an integer value', function () {
    $value = 🙃()->number->integerPositive();

    expect($value)->toBeInt();
});

test('integerPositive() method returns a positive integer', function () {
    $value = 🙃()->number->integerPositive();

    expect($value)->toBeGreaterThanOrEqual(1);
});