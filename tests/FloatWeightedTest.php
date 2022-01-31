<?php

declare(strict_types=1);

test('floatNormal() method returns a float', function () {
    $value = 🙃()->number->floatNormal();

    expect($value)->toBeFloat();
});
