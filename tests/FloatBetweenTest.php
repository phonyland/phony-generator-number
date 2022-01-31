<?php

declare(strict_types=1);

test('floatBetween() method returns a float value', function () {
    $value = 🙃()->number->floatBetween();

    expect($value)->toBeFloat();
});
