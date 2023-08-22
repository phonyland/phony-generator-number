<?php

declare(strict_types=1);

test('integer() method returns an integer value', function (): void {
    $value = 🙃()->number->integer();

    expect($value)->toBeInt();
});

test('integer() method returns an integer with the given number of $digits', function (): void {
    $numberOfDigits = random_int(1, 15);
    $value          = 🙃()->number->integer($numberOfDigits);

    expect(strlen((string) abs($value)))->toBeLessThanOrEqual($numberOfDigits);
});

test('integer() method returns an integer with exactly the given number of $digits', function (): void {
    $numberOfDigits = random_int(1, 15);
    $value          = 🙃()->number->integer($numberOfDigits, true);

    expect(strlen((string) abs($value)))->toBeLessThanOrEqual($numberOfDigits);
});

test('integer() method returns positive or negative integers', function (): void {
    $value = 🙃()->number->integer(1, true, true);
    expect($value)->toBeGreaterThan(0);

    $value = 🙃()->number->integer(1, true, false);
    expect($value)->toBeLessThan(0);
});
