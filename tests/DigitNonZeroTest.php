<?php

declare(strict_types=1);

test('digitNonZero() method returns an integer value', function () {
    $value = 🙃()->number->digitNonZero();

    expect($value)->toBeInt();
});
