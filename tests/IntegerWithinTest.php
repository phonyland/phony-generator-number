<?php

declare(strict_types=1);

test('integerWithin() method returns an integer value', function (): void {
    $value = 🙃()->number->integerWithin();

    expect($value)->toBeInt();
});

test('integerWithin() method returns an integer that the boundaries not included', function (): void {
    $value = 🙃()->number->integerWithin(1, 100);

    expect($value)->toBeGreaterThanOrEqual(2);
    expect($value)->toBeLessThanOrEqual(99);
});

test('integerWithin() method returns error if $min > $max', function (): void {
    🙃()->number->integerWithin(2, 1);
})->throws(Error::class);

test('integerWithin() method returns error if $min === $max', function (): void {
    🙃()->number->integerWithin(1, 1);
})->throws(Error::class);
