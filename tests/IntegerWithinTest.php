<?php

test('integerWithin() method returns an integer value', function () {
    $value = 🙃()->number->integerWithin();

    expect($value)->toBeInt();
});

test('integerWithin() method returns an integer that the boundaries not included', function () {
    $value = 🙃()->number->integerWithin(1, 100);

    expect($value)->toBeGreaterThanOrEqual(2);
    expect($value)->toBeLessThanOrEqual(99);
});

