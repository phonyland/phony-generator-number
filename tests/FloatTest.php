<?php

declare(strict_types=1);

test('float() method returns a float value', function (): void {
    $value = 🙃()->number->float();

    expect($value)->toBeFloat();
});

test('float() method left digit can be strictly set', function (): void {
    $leftDigits = random_int(1, 10);
    $value      = 🙃()->number->float($leftDigits, 0, true);

    expect(strlen((string) $value))->toBe($leftDigits);
});

test('float() method right digit can be strictly set', function (): void {
    $rightDigits = random_int(1, 14);
    $value       = 🙃()->number->float(1, $rightDigits, true);

    expect(strlen((string) $value))->toBeLessThanOrEqual($rightDigits + 2);
});
