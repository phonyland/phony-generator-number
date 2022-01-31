<?php

declare(strict_types=1);

test('integerNegative() method returns an integer value', function () {
    $value = 🙃()->number->integerNegative();

    expect($value)->toBeInt();
});

test('integerNegative() method returns a negative integer', function () {
    $value = 🙃()->number->integerNegative();

    expect($value)->toBeLessThanOrEqual(-1);
});
