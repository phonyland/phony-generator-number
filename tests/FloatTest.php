<?php

test('float() method returns a float value', function () {
    $value = 🙃()->number->float();

    expect($value)->toBeFloat();
});

test('float() method left digit can be strictly set', function () {
    $leftDigits = random_int(1, 10);
    $value = 🙃()->number->float($leftDigits, 0, true);

    expect(strlen($value))->toBe($leftDigits);
});
