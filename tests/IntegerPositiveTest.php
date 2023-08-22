<?php

declare(strict_types=1);

test('integerPositive() method returns an integer value', function (): void {
    $value = 🙃()->number->integerPositive();

    expect($value)->toBeInt();
});

test('integerPositive() method returns a positive integer', function (): void {
    $value = 🙃()->number->integerPositive();

    expect($value)->toBeGreaterThanOrEqual(1);
});

test('integerPositive() method returns error if $min is not positive', function (): void {
    🙃()->number->integerPositive(-1);
})->throws(Error::class);

test('integerPositive() method returns error if $min=0', function (): void {
    🙃()->number->integerPositive(0);
})->throws(Error::class);
