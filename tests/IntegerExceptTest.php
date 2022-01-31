<?php

declare(strict_types=1);

test('integerExcept() method returns an integer value', function () {
    $value = 🙃()->number->integerExcept();

    expect($value)->toBeInt();
});

test('integerExcept() method returns an integer except the given integer', function () {
    $value = 🙃()->number->integerExcept(2, 1, 2);

    expect($value)->toBe(1);
});

test('integerExcept() method returns an integer except the given array of integers', function () {
    $value = 🙃()->number->integerExcept([1, 2, 3, 4], 1, 5);

    expect($value)->toBe(5);
});


