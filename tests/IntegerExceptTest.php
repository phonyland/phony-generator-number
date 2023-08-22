<?php

declare(strict_types=1);

test('integerExcept() method returns an integer value', function (): void {
    $value = 🙃()->number->integerExcept();

    expect($value)->toBeInt();
});

test('integerExcept() method returns an integer except the given integer', function (): void {
    $value = 🙃()->number->integerExcept(2, 1, 2);

    expect($value)->toBe(1);
});

test('integerExcept() method returns an integer except the given array of integers', function (): void {
    $value = 🙃()->number->integerExcept([1, 2, 3, 4], 1, 5);

    expect($value)->toBe(5);
});

test('integerExcept() method throws a RangeException if there are not enough integers', function (): void {
    🙃()->number->integerExcept([1, 2, 3, 4, 5], 1, 5);
})->throws(RangeException::class);
