<?php

declare(strict_types=1);

test('integerNegative() method returns an integer value', function (): void {
    $value = 🙃()->number->integerNegative();

    expect($value)->toBeInt();
});

test('integerNegative() method returns a negative integer', function (): void {
    $value = 🙃()->number->integerNegative();

    expect($value)->toBeLessThanOrEqual(-1);
});

test('integerNegative() method returns error if $max is not negative', function (): void {
    🙃()->number->integerNegative(1);
})->throws(Error::class);

test('integerNegative() method returns error if $max=0', function (): void {
    🙃()->number->integerNegative(0);
})->throws(Error::class);
