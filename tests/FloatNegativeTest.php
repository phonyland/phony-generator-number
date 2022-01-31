<?php

declare(strict_types=1);

test('floatNegative() method returns a float value', function () {
    $value = 🙃()->number->floatNegative();

    expect($value)->toBeFloat();
});
