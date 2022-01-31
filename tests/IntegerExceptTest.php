<?php

declare(strict_types=1);

test('integerExcept() method returns an integer value', function () {
    $value = 🙃()->number->integerExcept();

    expect($value)->toBeInt();
});
