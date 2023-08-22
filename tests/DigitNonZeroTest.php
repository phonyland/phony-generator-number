<?php

declare(strict_types=1);

test('digitNonZero() method returns an integer value', function (): void {
    $value = 🙃()->number->digitNonZero();

    expect($value)->toBeInt();
});

test('digitNonZero() method returns a digit that is not zero', function (): void {
    $value = 🙃()->number->digitNonZero(2);
    expect($value)->toBe(1);

    $value = 🙃()->number->digitNonZero();
    expect($value)->not()->toBe(0);
});
