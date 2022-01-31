<?php

declare(strict_types=1);

test('floatPositive() method returns a float value', function () {
    $value = 🙃()->number->floatPositive();

    expect($value)->toBeFloat();
});
