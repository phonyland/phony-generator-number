<?php

declare(strict_types=1);

test('integer() method returns an integer value', function () {
    $value = 🙃()->number->integer();

    expect($value)->toBeInt();
});

test('integer() method returns an integer with the given number of $digits', function () {
    $numberOfDigits = random_int(1, 15);
    $value = 🙃()->number->integer($numberOfDigits);

    expect(strlen((string) abs($value)))->toBeLessThanOrEqual($numberOfDigits);
});